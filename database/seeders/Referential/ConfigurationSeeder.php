<?php

namespace Database\Seeders\Referential;

use App\Models\Configuration;
use Illuminate\Database\Seeder;

class ConfigurationSeeder extends Seeder
{
    private $data = [
        [
            "name" => "Enable registration",
            "is_enabled" => true
        ],
        [
            "name" => "Enable public discussions",
            "is_enabled" => true
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
            if (!Configuration::where('name', $item['name'])->count()) {
                Configuration::create($item);
            }
        }
    }
}
