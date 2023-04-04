<?php


use App\Models\User;
use Database\Seeders\Permissions\PermissionsSeeder;
use Database\Seeders\Permissions\RolePermissionsSeeder;
use Database\Seeders\Permissions\RolesSeeder;
use Database\Seeders\Permissions\UserRolesSeeder;
use Database\Seeders\Permissions\UsersSeeder;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;


it('doesnt allow guest to access admin backend', function () {
    $adminBackendUrl = config("filament.path");
    get($adminBackendUrl)
        ->assertStatus(302);
});


it('allows admin user to access admin backend', function ($adminPage) {
    asAdmin()
        ->get($adminPage)
        ->assertStatus(200);
})->with(function (){
    $adminBackendUrl = config("filament.path");
    return [
        $adminBackendUrl,
        $adminBackendUrl.'/configurations',
        $adminBackendUrl.'/notifications',
        $adminBackendUrl.'/tags',
        $adminBackendUrl.'/users',
        $adminBackendUrl.'/roles',
        $adminBackendUrl.'/permissions',
    ];
});

