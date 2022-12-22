<?php

namespace App\Models;

use App\Core\RoleConstants;
use Devaslanphp\FilamentAvatar\Core\HasAvatarUrl;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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
}
