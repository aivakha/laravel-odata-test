<?php

namespace Database\Seeders;

use App\Services\API\CashCheckService;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CashCheckSeeder::class);
    }
}
