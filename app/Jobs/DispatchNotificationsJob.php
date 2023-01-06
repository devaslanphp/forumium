<?php

namespace App\Jobs;

use App\Core\FollowerConstants;
use App\Core\NotificationConstants;
use App\Models\Comment;
use App\Models\Discussion;
use App\Models\Reply;
use App\Notifications\EmailNotification;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class DispatchNotificationsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;
    public $notification;
    public $object;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user, $notification, $object)
    {
        $this->user = $user;
        $this->notification = $notification;
        $this->object = $object;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $title = null;
        $body = null;
        $url = null;
        $recipient = null;

        switch ($this->notification) {
            case NotificationConstants::MY_DISCUSSION_EDITED->value:
                // $object = Discussion
                if ($this->object->user->id != $this->user->id) {
                    $title = 'Discussion edited';
                    $body = $this->user->name . ' edited your discussion ' . $this->object->name;
                    $url = route('discussion', ['discussion' => $this->object, 'slug' => Str::slug($this->object->name)]);
                    $recipient = $this->object->user;
                    $this->sendNotification($title, $body, $recipient, $url);
                }
                break;
            case NotificationConstants::POST_IN_DISCUSSION->value:
                // $this->object = Discussion
                if ($this->object) {
                    $users = $this->object->followers()->where('type', FollowerConstants::FOLLOWING->value)->get();
                    foreach ($users as $u) {
                        if ($this->user->id != $u->id) {
                            $title = 'Discussion updated';
                            $body = 'A new activity has been done by ' . $this->user->name . ' into the discussion ' . $this->object->name;
                            $url = route('discussion', ['discussion' => $this->object, 'slug' => Str::slug($this->object->name)]);
                            $recipient = $u;
                            $this->sendNotification($title, $body, $recipient, $url);
                        }
                    }
                }
                break;
            case NotificationConstants::MY_REPLY_BEST_ANSWER->value:
                // $this->object = Reply
                if ($this->object->user->id != $this->user->id) {
                    $title = 'Best answer!';
                    $body = $this->user->name . ' marked your reply as best answer';
                    $url = route('discussion', ['discussion' => $this->object->discussion, 'slug' => Str::slug($this->object->name), 'r' => $this->object->id]);
                    $recipient = $this->object->user;
                    $this->sendNotification($title, $body, $recipient, $url);
                }
                break;
            case NotificationConstants::MY_POSTS_COMMENTED->value:
                // $this->object = Comment
                if ($this->object->user->id != $this->user->id) {
                    if ($this->object->source instanceof Discussion) {
                        $title = 'Discussion commented';
                        $body = $this->user->name . ' added a comment to your discussion';
                        $url = route('discussion', ['discussion' => $this->object->discussion, 'slug' => Str::slug($this->object->name), 'd' => $this->object->source->id, 'c' => $this->object->id]);
                    } elseif ($this->object->source instanceof Reply) {
                        $title = 'Reply commented';
                        $body = $this->user->name . ' added a comment to your reply';
                        $url = route('discussion', ['discussion' => $this->object->discussion, 'slug' => Str::slug($this->object->name), 'd' => $this->object->source->source->id, 'r' => $this->object->source->id, 'c' => $this->object->id]);
                    }
                    $recipient = $this->object->user;
                    $this->sendNotification($title, $body, $recipient, $url);
                }
                break;
            case NotificationConstants::MY_POSTS_LIKED->value:
                // $this->object = Like
                if ($this->object->source instanceof Discussion) {
                    $title = 'Discussion liked';
                    $body = $this->user->name . ' liked your discussion';
                    $url = route('discussion', ['discussion' => $this->object->source, 'slug' => Str::slug($this->object->source->name), 'd' => $this->object->source->id, 'l' => $this->object->id]);
                    $recipient = $this->object->source->user;
                } elseif ($this->object->source instanceof Reply) {
                    $title = 'Reply liked';
                    $body = $this->user->name . ' liked your reply';
                    $url = route('discussion', ['discussion' => $this->object->source->discussion, 'slug' => Str::slug($this->object->source->discussion->name), 'd' => $this->object->source->discussion->id, 'r' => $this->object->source->id, 'l' => $this->object->id]);
                    $recipient = $this->object->source->user;
                } elseif ($this->object->source instanceof Comment) {
                    $title = 'Comment liked';
                    $body = $this->user->name . ' liked your comment';
                    if ($this->object->source->source instanceof Discussion) {
                        $url = route('discussion', ['discussion' => $this->object->source->source, 'slug' => Str::slug($this->object->source->source->name), 'd' => $this->object->source->source->id, 'c' => $this->object->source->id, 'l' => $this->object->id]);
                        $recipient = $this->object->source->source->user;
                    } elseif ($this->object->source->source instanceof Reply) {
                        $url = route('discussion', ['discussion' => $this->object->source->source->discussion, 'slug' => Str::slug($this->object->source->source->discussion->name), 'd' => $this->object->source->source->discussion->id, 'r' => $this->object->source->source->id, 'c' => $this->object->source->id, 'l' => $this->object->id]);
                        $recipient = $this->object->source->source->user;
                    }
                }
                $this->sendNotification($title, $body, $recipient, $url);
                break;
            case NotificationConstants::POINTS_UPDATED->value:
                // $this->object = array (containing 'added' and 'current')
                $title = 'Points updated';
                $body = 'Your points are updated (' . ($this->object['added'] > 0 ? '+' : '-') . $this->object['added'] . '), you have now ' . $this->object['current'];
                $url = route('profile.index');
                $recipient = $this->user;
                $this->sendNotification($title, $body, $recipient, $url);
                break;
            case NotificationConstants::DISCUSSION_LOCKED->value:
                // $this->object = Discussion
                $title = 'Discussion locked';
                $body = 'Your discussion ' . $this->object->name . ' is now locked by ' . $this->user->name;
                $url = route('discussion', ['discussion' => $this->object, 'slug' => Str::slug($this->object->name)]);
                $recipient = $this->object->user;
                $this->sendNotification($title, $body, $recipient, $url);
                break;
            case NotificationConstants::DISCUSSION_UNLOCKED->value:
                // $this->object = Discussion
                $title = 'Discussion unlocked';
                $body = 'Your discussion ' . $this->object->name . ' is now unlocked by ' . $this->user->name;
                $url = route('discussion', ['discussion' => $this->object, 'slug' => Str::slug($this->object->name)]);
                $recipient = $this->object->user;
                $this->sendNotification($title, $body, $recipient, $url);
                break;
        }
    }

    private function sendNotification(string $title, string $body, $recipient, string|null $url)
    {
        if ($title && $body && $recipient) {
            // Via web
            if ($this->user->hasNotification($this->notification, true, false)) {
                $actions = [];
                if ($url) {
                    $actions = [
                        Action::make('view')
                            ->label('View')
                            ->icon('heroicon-s-eye')
                            ->color('secondary')
                            ->url($url)
                    ];
                }
                Notification::make()
                    ->title($title)
                    ->body($body)
                    ->actions($actions ?? [])
                    ->sendToDatabase($recipient);
            }
        }
        // Via email
        if ($this->user->hasNotification($this->notification, false, true)) {
            $this->user->notify(new EmailNotification($title, $body, $url));
        }
    }
}
