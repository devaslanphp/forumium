<?php

namespace Database\Seeders\Permissions;

use App\Core\RoleConstants;
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
            UserRole::where('user_id', $user->id)->where('role_id', Role::where('name', RoleConstants::MEMBER->value)->first()->id)->delete();
            if (!UserRole::where('user_id', $user->id)->where('role_id', $role)->count()) {
                UserRole::create([
                    'user_id' => $user->id,
                    'role_id' => $role->id
                ]);
            }
        }

        // Mod
        $mod = UsersSeeder::$mod['email'];
        $modRole = RolesSeeder::$modRole;
        $user = User::where('email', $mod)->first();
        $role = Role::where('name', $modRole)->first();
        if ($user && $role) {
            UserRole::where('user_id', $user->id)->where('role_id', Role::where('name', RoleConstants::MEMBER->value)->first()->id)->delete();
            if (!UserRole::where('user_id', $user->id)->where('role_id', $role)->count()) {
                UserRole::create([
                    'user_id' => $user->id,
                    'role_id' => $role->id
                ]);
            }
        }
    }
}
