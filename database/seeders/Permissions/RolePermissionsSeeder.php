<?php

namespace Database\Seeders\Permissions;

use App\Models\Permission;
use App\Models\Role;
use App\Models\RolePermission;
use Illuminate\Database\Seeder;

class RolePermissionsSeeder extends Seeder
{
    private $data = [
        [
            "role" => "Admin",
            "permissions" => [
                "Start discussions",
                "Reply to discussions",
                "Like posts",
                "Comment posts",
                "Pin discussions",
                "Edit posts",
                "Delete posts",
                "View posts stats",
                "Lock discussions",
            ]
        ],
        [
            "role" => "Mod",
            "permissions" => [
                "Start discussions",
                "Reply to discussions",
                "Like posts",
                "Comment posts",
                "Pin discussions",
                "Edit posts",
                "Delete posts",
                "View posts stats",
                "Lock discussions",
            ]
        ],
        [
            "role" => "Member",
            "permissions" => [
                "Start discussions",
                "Reply to discussions",
                "Like posts",
                "Comment posts",
            ]
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->data as $item) {
            $role = Role::where('name', $item['role'])->first();
            if ($role) {
                foreach ($item['permissions'] as $permission) {
                    if ($p = Permission::where('name', $permission)->first()) {
                        if (!RolePermission::where('role_id', $role->id)->where('permission_id', $p->id)->count()) {
                            RolePermission::create([
                                'role_id' => $role->id,
                                'permission_id' => $p->id
                            ]);
                        }
                    }
                }
            }
        }
    }
}
