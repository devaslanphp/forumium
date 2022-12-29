<?php

namespace Database\Seeders\Permissions;

use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\Seeder;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin
        $admin = UsersSeeder::$admin['email'];
        $adminRole = RolesSeeder::$adminRole;
        $user = User::where('email', $admin)->first();
        $role = Role::where('name', $adminRole)->first();
        if ($user && $role) {
            UserRole::create([
                'user_id' => $user->id,
                'role_id' => $role->id
            ]);
        }

        // Mod
        $mod = UsersSeeder::$mod['email'];
        $modRole = RolesSeeder::$modRole;
        $user = User::where('email', $mod)->first();
        $role = Role::where('name', $modRole)->first();
        if ($user && $role) {
            UserRole::create([
                'user_id' => $user->id,
                'role_id' => $role->id
            ]);
        }

        // Members
        $memberRole = RolesSeeder::$memberRole;
        if ($role = Role::where('name', $memberRole)->first()) {
            $members = User::whereNotIn('email', [$admin, $mod])->get();
            foreach ($members as $member) {
                UserRole::create([
                    'user_id' => $member->id,
                    'role_id' => $role->id
                ]);
            }
        }
    }
}
