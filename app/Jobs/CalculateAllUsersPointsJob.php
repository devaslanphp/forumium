<?php

namespace App\Jobs;

use App\Core\PointsConstants;
use App\Models\Comment;
use App\Models\Discussion;
use App\Models\Like;
use App\Models\Reply;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CalculateAllUsersPointsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        User::all()
            ->each(function (User $user) {
                $user->total_points = 0;
                $user->save();

                // Discussions
                $user->discussions
                    ->each(function (Discussion $discussion) use ($user) {
                        dispatch(new CalculateUserPointsJob($user, $discussion, PointsConstants::START_DISCUSSION->value));
                    });

                // Replies
                $user->replies
                    ->each(function (Reply $reply) use ($user) {
                        dispatch(new CalculateUserPointsJob($user, $reply, PointsConstants::NEW_REPLY->value));
                    });

                // Comments
                $user->comments
                    ->each(function (Comment $comment) use ($user) {
                        dispatch(new CalculateUserPointsJob($user, $comment, PointsConstants::NEW_COMMENT->value));
                    });

                // Likes
                $user->likes
                    ->each(function (Like $like) {
                        if ($like->source instanceof Discussion) {
                            dispatch(new CalculateUserPointsJob($like->source->user, $like, PointsConstants::DISCUSSION_LIKED->value));
                        } elseif ($like->source instanceof Reply) {
                            dispatch(new CalculateUserPointsJob($like->source->user, $like, PointsConstants::REPLY_LIKED->value));
                        } elseif ($like->source instanceof Comment) {
                            dispatch(new CalculateUserPointsJob($like->source->user, $like, PointsConstants::COMMENT_LIKED->value));
                        }
                    });

                // Best replies
                $user->replies()->where('is_best', true)
                    ->get()
                    ->each(function (Reply $reply) use ($user) {
                        dispatch(new CalculateUserPointsJob($reply->user, $reply, PointsConstants::BEST_REPLY->value));
                    });
            });
    }
}
