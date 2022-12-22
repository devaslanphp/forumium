<?php

namespace App\Core;

enum PermissionConstants: string
{

    case START_DISCUSSIONS = 'Start discussions';
    case REPLY_TO_DISCUSSIONS = 'Reply to discussions';
    case LIKE_POSTS = 'Like posts';
    case COMMENT_POSTS = 'Comment posts';
    case PIN_DISCUSSIONS = 'Pin discussions';
    case EDIT_POSTS = 'Edit posts';
    case DELETE_POSTS = 'Delete posts';
    case VIEW_POSTS_STATS = 'View posts stats';
    case LOCK_DISCUSSIONS = 'Lock discussions';

}
