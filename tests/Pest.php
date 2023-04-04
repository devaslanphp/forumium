<?php

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "uses()" function to bind a different classes or traits.
|
*/

use App\Models\User;
use Database\Seeders\Permissions\PermissionsSeeder;
use Database\Seeders\Permissions\RolePermissionsSeeder;
use Database\Seeders\Permissions\RolesSeeder;
use Database\Seeders\Permissions\UserRolesSeeder;
use Database\Seeders\Permissions\UsersSeeder;

uses(
    Tests\TestCase::class,
     Illuminate\Foundation\Testing\LazilyRefreshDatabase::class,
//     Illuminate\Foundation\Testing\RefreshDatabase::class,
     Illuminate\Foundation\Testing\DatabaseMigrations::class,
)->in('Feature');

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/
function asAdmin()
{
    // Permissions
    app(PermissionsSeeder::class)->run();
    app(RolesSeeder::class)->run();
    app(RolePermissionsSeeder::class)->run();
    app(UsersSeeder::class)->run();
    app(UserRolesSeeder::class)->run();
    /* create admin user */
    $adminUser = User::factory()->create([
        'name' => 'Administrator',
        'email' => fake()->email(),
        'email_verified_at' => now(),
        'bio' => fake()->paragraph(),
        'is_email_visible' => false,
        'password' => '$2a$12$72TkvzkAKhAMyPS9asI3C.1/VGqSt/jM2yDQikv.DzNi9EqHgMwUu',
    ]);

    return test()->actingAs($adminUser);

}
