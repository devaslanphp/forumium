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
        $this->assignRole(UsersSeeder::$admin['email'], RolesSeeder::$adminRole);
        $this->assignRole(UsersSeeder::$mod['email'], RolesSeeder::$modRole);
        $this->assignRole(UsersSeeder::$member1['email'], RolesSeeder::$memberRole);
        $this->assignRole(UsersSeeder::$member2['email'], RolesSeeder::$memberRole);
    }

    private function assignRole($userEmail, $roleName)
    {
        $user = User::where('email', $userEmail)->first();
        $role = Role::where('name', $roleName)->first();

        if ($user && $role) {
            $defaultMemberRoleId = Role::where('name', RoleConstants::MEMBER->value)->first()->id;

            UserRole::where('user_id', $user->id)->where('role_id', $defaultMemberRoleId)->delete();

            if (!UserRole::where('user_id', $user->id)->where('role_id', $role->id)->count()) {
                UserRole::create([
                    'user_id' => $user->id,
                    'role_id' => $role->id
                ]);
            }
        }
    }
}
