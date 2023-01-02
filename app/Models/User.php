<?php

namespace App\Models;

use App\Core\RoleConstants;
use Devaslanphp\FilamentAvatar\Core\HasAvatarUrl;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail, CanResetPassword, FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable, HasAvatarUrl;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'bio',
        'is_email_visible',
        'picture',
        'total_points'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function boot()
    {
        parent::boot();

        static::created(function (User $item) {
            UserRole::create([
                'role_id' => Role::where('name', RoleConstants::MEMBER->value)->first()->id,
                'user_id' => $item->id
            ]);
        });
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'user_roles', 'user_id', 'role_id');
    }

    public function canAccessFilament(): bool
    {
        return $this->has(RoleConstants::ADMIN->value);
    }

    public function has(string $role): bool
    {
        return $this->roles()->where('name', $role)->count() != 0;
    }

    public function can($abilities, $arguments = []): bool
    {
        $permissions = [];
        if (!is_iterable($abilities)) {
            $permissions = [$abilities];
        } else {
            foreach ($abilities as $ability) {
                $permissions[] = $ability;
            }
        }
        return $this->roles->pluck('permissions')->flatten()->whereIn('name', $permissions)->count();
    }

    public function appNotifications(): BelongsToMany
    {
        return $this->belongsToMany(Notification::class, 'user_notifications', 'user_id', 'notification_id')->withPivot(['via_web', 'via_email']);
    }

    public function socials(): HasMany
    {
        return $this->hasMany(Social::class, 'user_id', 'id');
    }

    public function discussions(): HasMany
    {
        return $this->hasMany(Discussion::class, 'user_id', 'id');
    }

    public function replies(): HasMany
    {
        return $this->hasMany(Reply::class, 'user_id', 'id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'user_id', 'id');
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class, 'user_id', 'id');
    }

    public function followings(): BelongsToMany
    {
        return $this->belongsToMany(Discussion::class, 'followers', 'user_id', 'discussion_id')->withPivot('type');
    }

    public function discussionVisits(): HasMany
    {
        return $this->hasMany(DiscussionVisit::class, 'user_id', 'id');
    }

    public function discussionsTotalViews(): Attribute
    {
        return new Attribute(
            get: fn() => $this->discussions()->sum('visits')
        );
    }

    public function discussionsTotalUniqueViews(): Attribute
    {
        return new Attribute(
            get: fn() => $this->discussions()->sum('unique_visits')
        );
    }

    public function lastActivity(): Attribute
    {
        return new Attribute(
            get: fn() => $this->discussions
                    ->merge($this->replies)
                    ->merge($this->comments)
                    ->merge($this->likes)
                    ->sortByDesc('updated_at')
                    ->first()?->updated_at ?? $this->updated_at
        );
    }

    public function hasNotification(string $notification, bool $isWeb, bool $isMail): bool
    {
        $query = $this->appNotifications()->where('name', $notification);
        if ($isWeb) {
            $query->where('via_web', true);
        }
        if ($isMail) {
            $query->where('via_email', true);
        }
        return $query->count() > 0;
    }
}
