<?php

namespace Database\Seeders\Permissions;

use App\Models\Notification;
use App\Models\User;
use App\Models\UserNotification;
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
            $data['bio'] = fake()->paragraph();
            $data['is_email_visible'] = false;
            User::create($data);
        }

        // Mod
        if (!User::where('email', self::$mod['email'])->count()) {
            $data = self::$mod;
            $data['email_verified_at'] = now();
            $data['password'] = $this->password;
            $data['bio'] = fake()->paragraph();
            $data['is_email_visible'] = false;
            User::create($data);
        }

        // Notifications
        User::all()->each(function ($user) {
            Notification::all()
                ->each(function ($notification) use ($user) {
                    UserNotification::create([
                        'notification_id' => $notification->id,
                        'user_id' => $user->id,
                        'via_web' => collect([true, false])->random(),
                        'via_email' => collect([true, false])->random()
                    ]);
                });
        });
    }
}
