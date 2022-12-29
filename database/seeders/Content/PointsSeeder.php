<?php

namespace Database\Seeders\Content;

use App\Jobs\CalculateAllUsersPointsJob;
use Illuminate\Database\Seeder;

class PointsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        dispatch(new CalculateAllUsersPointsJob);
    }
}
