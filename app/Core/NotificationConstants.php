<?php

namespace App\Core;

enum NotificationConstants: string
{

    case MY_DISCUSSION_EDITED = "Someone edited my discussion";
    case POST_IN_DISCUSSION = "Someone posts in a discussion I'm following";
    case MY_REPLY_BEST_ANSWER = "Someone sets my reply as a best answer";
    case MY_POSTS_COMMENTED = "Someone commented to one of my posts";
    case MY_POSTS_LIKED = "Someone likes one of my posts";
    case POINTS_UPDATED = "My account points are updated after an action";
    case DISCUSSION_LOCKED = "My discussion is locked by a moderator / administrator";
    case DISCUSSION_UNLOCKED = "My discussion is unlocked by a moderator / administrator";

}
