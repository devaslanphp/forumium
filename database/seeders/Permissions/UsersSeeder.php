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
        'email' => 'admin@domain.com'
    ];

    public static array $mod = [
        'name' => 'Moderator',
        'email' => 'mod@domain.com'
    ];


    public static array $member1 = [
        'name' => 'Jane Doe',
        'email' => 'jane@domain.com'
    ];

    public static array $member2 = [
        'name' => 'John Depp',
        'email' => 'John@domain.com'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createOrUpdateUser(self::$admin);
        $this->createOrUpdateUser(self::$mod);
        $this->createOrUpdateUser(self::$member1);
        $this->createOrUpdateUser(self::$member2);

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

    private function createOrUpdateUser(array $userData)
    {
        if (!User::where('email', $userData['email'])->count()) {
            $data = $userData;
            $data['email_verified_at'] = now();
            $data['password'] = $this->password;
            $data['bio'] = fake()->paragraph();
            $data['is_email_visible'] = false;
            User::create($data);
        }
    }
}
