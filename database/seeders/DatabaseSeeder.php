<?php

namespace Database\Seeders;

use Database\Seeders\Permissions\PermissionsSeeder;
use Database\Seeders\Permissions\RolePermissionsSeeder;
use Database\Seeders\Permissions\RolesSeeder;
use Database\Seeders\Permissions\UserRolesSeeder;
use Database\Seeders\Permissions\UsersSeeder;
use Database\Seeders\Referential\ConfigurationSeeder;
use Database\Seeders\Referential\NotificationSeeder;
use Database\Seeders\Referential\TagsSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Referential
        $this->call(TagsSeeder::class);
        $this->call(NotificationSeeder::class);
        $this->call(ConfigurationSeeder::class);

        // Permissions
        $this->call(PermissionsSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(RolePermissionsSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(UserRolesSeeder::class);
    }
}
