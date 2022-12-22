<?php

namespace App\Core;

enum RoleConstants: string
{

    case ADMIN = 'Admin';
    case MOD = 'Mod';
    case MEMBER = 'Member';

}
