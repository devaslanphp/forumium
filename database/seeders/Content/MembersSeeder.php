<?php

namespace Database\Seeders\Content;

use App\Models\Comment;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Notification;
use App\Models\UserNotification;
use Database\Seeders\Permissions\UsersSeeder;

class MembersSeeder extends Seeder
{
    private $password = '$2a$12$72TkvzkAKhAMyPS9asI3C.1/VGqSt/jM2yDQikv.DzNi9EqHgMwUu'; // password
  
    private $members = 30;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Members
        User::factory()
            ->count($this->members)
            ->create();
      
      // Notifications
        User::whereNotIn('email', [UsersSeeder::$admin['email'], UsersSeeder::$mod['email']])
          ->get()
          ->each(function ($user) {
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
