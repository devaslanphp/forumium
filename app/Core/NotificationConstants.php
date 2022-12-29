<?php

namespace App\Core;

enum NotificationConstants: string
{

    case MY_DISCUSSION_EDITED = "Someone edited my discussion";
    case POST_IN_DISCUSSION = "Someone posts in a discussion I'm following";
    case MY_DISCUSSION_LOCKED = "Someone locks my discussion";
    case MY_POSTS_VOTED = "When one of my posts is up/down voted";
    case MY_REPLY_BEST_ANSWER = "Someone sets my reply as a best answer";
    case BEST_ANSWER_IN_DISCUSSION = "A best answer is set in a discussion I participated in";
    case MY_POSTS_COMMENTED = "Someone commented to one of my posts";
    case MENTION_ME = "Someone mentions me in a post";
    case MY_POSTS_LIKED = "Someone likes one of my posts";
    case MOD_WARNS_ME = "A moderator warns me";
    case DISCUSSION_CREATED_TAG_FOLLOWING = "Someone creates a discussion in a tag I'm following";
    case POINTS_UPDATED = "My account points are updated after an action";

}
