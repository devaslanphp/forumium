<?php

namespace App\Jobs;

use App\Core\FollowerConstants;
use App\Core\NotificationConstants;
use App\Models\Comment;
use App\Models\Discussion;
use App\Models\Reply;
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

        switch ($this->notification) {
            case NotificationConstants::MY_DISCUSSION_EDITED->value:
                // $object = Discussion
                if ($this->object->user->id != $this->user->id) {
                    $title = 'Discussion edited';
                    $body = $this->user->name . ' edited your discussion ' . $this->object->name;
                    $url = route('discussion', ['discussion' => $this->object, 'slug' => Str::slug($this->object->name)]);
                }
                break;
            case NotificationConstants::POST_IN_DISCUSSION->value:
                // $this->object = Discussion
                $users = $this->object->followings()->where('type', FollowerConstants::FOLLOWING->value)->get();
                foreach ($users as $u) {
                    if ($this->user->id != $u->id) {
                        $title = 'Discussion updated';
                        $body = 'A new activity has been done by ' . $this->user->name . ' into the discussion ' . $this->object->name;
                        $url = route('discussion', ['discussion' => $this->object, 'slug' => Str::slug($this->object->name)]);
                    }
                }
                break;
            case NotificationConstants::MY_REPLY_BEST_ANSWER->value:
                // $this->object = Reply
                if ($this->object->user->id != $this->user->id) {
                    $title = 'Best answer!';
                    $body = $this->user->name . ' marked your reply as best answer';
                    $url = route('discussion', ['discussion' => $this->object->discussion, 'slug' => Str::slug($this->object->name), 'r' => $this->object->id]);
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
                }
                break;
            case NotificationConstants::MY_POSTS_LIKED->value:
                // $this->object = Like
                if ($this->object->user->id != $this->user->id) {
                    if ($this->object->source instanceof Discussion) {
                        $title = 'Discussion liked';
                        $body = $this->user->name . ' liked your discussion';
                        $url = route('discussion', ['discussion' => $this->object->discussion, 'slug' => Str::slug($this->object->name), 'd' => $this->object->source->id, 'l' => $this->object->id]);
                    } elseif ($this->object->source instanceof Reply) {
                        $title = 'Reply liked';
                        $body = $this->user->name . ' liked your reply';
                        $url = route('discussion', ['discussion' => $this->object->discussion, 'slug' => Str::slug($this->object->name), 'd' => $this->object->source->source->id, 'r' => $this->object->source->id, 'l' => $this->object->id]);
                    } elseif ($this->object->source instanceof Comment) {
                        $title = 'Comment liked';
                        $body = $this->user->name . ' liked your comment';
                        if ($this->object->source->source instanceof Discussion) {
                            $url = route('discussion', ['discussion' => $this->object->discussion, 'slug' => Str::slug($this->object->name), 'd' => $this->object->source->source->discussion->id, 'c' => $this->object->source->id, 'l' => $this->object->id]);
                        } elseif ($this->object->source->source instanceof Reply) {
                            $url = route('discussion', ['discussion' => $this->object->discussion, 'slug' => Str::slug($this->object->name), 'd' => $this->object->source->source->reply->discussion->id, 'r' => $this->object->source->source->reply->id, 'c' => $this->object->source->id, 'l' => $this->object->id]);
                        }
                    }
                }
                break;
            case NotificationConstants::POINTS_UPDATED->value:
                $title = 'Points updated';
                $body = 'Your points are updated (' . ($this->object['added'] > 0 ? '+' : '-') . $this->object['added'] . '), you have now ' . $this->object['current'];
                $url = route('profile.index');
                break;
        }
        if ($title && $body) {
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
                ->sendToDatabase($this->user);
        }
    }
}
