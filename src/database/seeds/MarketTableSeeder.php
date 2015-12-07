<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class MarketTableSeeder extends Seeder
{
    public function run()
    {
        Model::unguard();

        $this->call(MarketPackageTableSeeder::class);
        $this->call(MarketResourceTableSeeder::class);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="MarketTableSeeder"
 */