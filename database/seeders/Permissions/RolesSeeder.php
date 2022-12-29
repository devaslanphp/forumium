<?php

namespace Database\Seeders\Permissions;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    public static string $adminRole = 'Admin';
    public static string $modRole = 'Mod';
    public static string $memberRole = 'Member';

    private $data = [
        [
            "name" => "Admin",
            "color" => "#e01d1d",
            "description" => "<p>Platform admins</p>",
        ],
        [
            "name" => "Mod",
            "color" => "#ae1de0",
            "description" => "<p>Platform mods</p>",
        ],
        [
            "name" => "Member",
            "color" => "#1dc9e0",
            "description" => "<p>Platform members</p>",
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->data as $item) {
            if (!Role::where('name', $item['name'])->count()) {
                Role::create($item);
            }
        }
    }
}
