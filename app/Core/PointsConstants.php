<?php

namespace App\Core;

enum PointsConstants: string
{

    case START_DISCUSSION = 'start-discussion';
    case DISCUSSION_DELETED = 'discussion-deleted';
    case DISCUSSION_LIKED = 'discussion-liked';
    case DISCUSSION_DISLIKED = 'discussion-disliked';

    case NEW_REPLY = 'new-reply';
    case REPLY_DELETED = 'reply-deleted';
    case BEST_REPLY = 'best-reply';
    case BEST_REPLY_REMOVED = 'best-reply-removed';
    case REPLY_LIKED = 'reply-liked';
    case REPLY_DISLIKED = 'reply-disliked';

    case NEW_COMMENT = 'new-comment';
    case COMMENT_DELETED = 'comment-deleted';
    case COMMENT_LIKED = 'comment-liked';
    case COMMENT_DISLIKED = 'comment-disliked';

    public static function value(string $name): int
    {
        $points = [
            self::START_DISCUSSION->value => 10,
            self::DISCUSSION_DELETED->value => -10,
            self::DISCUSSION_LIKED->value => 5,
            self::DISCUSSION_DISLIKED->value => -5,

            self::NEW_REPLY->value => 2,
            self::REPLY_DELETED->value => -2,
            self::BEST_REPLY->value => 10,
            self::BEST_REPLY_REMOVED->value => -10,
            self::REPLY_LIKED->value => 2,
            self::REPLY_DISLIKED->value => -2,

            self::NEW_COMMENT->value => 1,
            self::COMMENT_DELETED->value => -1,
            self::COMMENT_LIKED->value => 1,
            self::COMMENT_DISLIKED->value => -1,
        ];
        return $points[$name] ?? 0;
    }

    public static function caseToDelete(string $name): bool
    {
        return self::value($name) < 0;
    }

}
