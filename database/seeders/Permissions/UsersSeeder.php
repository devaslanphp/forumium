<?php

namespace Database\Seeders\Permissions;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    private $password = '$2a$12$72TkvzkAKhAMyPS9asI3C.1/VGqSt/jM2yDQikv.DzNi9EqHgMwUu'; // password

    public static array $admin = [
        'name' => 'Administrator',
        'email' => 'admin@forumium.app'
    ];

    public static array $mod = [
        'name' => 'Moderator',
        'email' => 'mod@forumium.app'
    ];

    private $members = 30;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin
        if (!User::where('email', self::$admin['email'])->count()) {
            $data = self::$admin;
            $data['email_verified_at'] = now();
            $data['password'] = $this->password;
            User::create($data);
        }

        // Mod
        if (!User::where('email', self::$mod['email'])->count()) {
            $data = self::$mod;
            $data['email_verified_at'] = now();
            $data['password'] = $this->password;
            User::create($data);
        }

        // Members
        User::factory()->count($this->members)->create();
    }
}
