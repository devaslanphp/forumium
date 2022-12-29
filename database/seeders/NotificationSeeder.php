<?php

namespace Database\Seeders;

use App\Core\NotificationConstants;
use App\Jobs\DispatchNotificationsJob;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Reply;
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Replies
        $replies = Reply::all();
        foreach ($replies as $reply) {
            dispatch(new DispatchNotificationsJob($reply->user, NotificationConstants::POST_IN_DISCUSSION->value, $reply->discussion));
        }

        // Comments
        $comments = Comment::all();
        foreach ($comments as $comment) {
            dispatch(new DispatchNotificationsJob($comment->user, NotificationConstants::POST_IN_DISCUSSION->value, $comment->discussion));
            dispatch(new DispatchNotificationsJob($comment->user, NotificationConstants::MY_POSTS_COMMENTED->value, $comment));
        }

        // Likes
        $likes = Like::all();
        foreach ($likes as $like) {
            dispatch(new DispatchNotificationsJob($like->user, NotificationConstants::MY_POSTS_LIKED->value, $like));
        }
    }
}
