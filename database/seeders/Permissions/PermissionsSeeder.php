<?php

namespace Database\Seeders\Permissions;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    private $data = [
        [
            "name" => "Start discussions",
            "description" => "<p>Create a new discussion</p>",
        ],
        [
            "name" => "Reply to discussions",
            "description" => "<p>Add a reply (answer) to discussions</p>",
        ],
        [
            "name" => "Like posts",
            "description" => "<p>Like discussions and replies</p>",
        ],
        [
            "name" => "Comment posts",
            "description" => "<p>Add a comment to discussions and replies</p>",
        ],
        [
            "name" => "Pin discussions",
            "description" => "<p>Add discussions to pinned section</p>",
        ],
        [
            "name" => "Edit posts",
            "description" => "<p>Edit discussions and replies</p>",
        ],
        [
            "name" => "Delete posts",
            "description" => "<p>Delete discussions and replies</p>",
        ],
        [
            "name" => "View posts stats",
            "description" => "<p>View discussions and replies stats&nbsp;</p>",
        ],
        [
            "name" => "Lock discussions",
            "description" => "<p>Disable all interactions to discussions</p>",
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
            if (!Permission::where('name', $item['name'])->count()) {
                Permission::create($item);
            }
        }
    }
}
