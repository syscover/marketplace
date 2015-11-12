<?php

use Illuminate\Database\Seeder;
use Syscover\Pulsar\Models\Package;

class MarketplacePackageTableSeeder extends Seeder
{
    public function run()
    {
        Package::insert([
            ['id_012' => '9', 'name_012' => 'Marketplace Package', 'folder_012' => 'marketplace', 'sorting_012' => 9, 'active_012' => '0']
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="MarketplacePackageTableSeeder"
 */