<?php

use Illuminate\Database\Seeder;
use Syscover\Pulsar\Models\Resource;

class MarketResourceTableSeeder extends Seeder {

    public function run()
    {
        Resource::insert([
            ['id_007' => 'market',              'name_007' => 'Market Package',    'package_007' => '9'],
            ['id_007' => 'market-tax',          'name_007' => 'Taxes',                  'package_007' => '9'],
            ['id_007' => 'market-product-tax',  'name_007' => 'Taxes -- Product tax',   'package_007' => '9'],
            ['id_007' => 'market-customer-tax', 'name_007' => 'Taxes -- Customer tax',  'package_007' => '9'],
            ['id_007' => 'market-tax-tax',      'name_007' => 'Taxes -- Tax',           'package_007' => '9'],
            ['id_007' => 'market-tax-rule',     'name_007' => 'Taxes -- Tax rule',      'package_007' => '9'],
            ['id_007' => 'market-category',     'name_007' => 'Categories',             'package_007' => '9'],
            ['id_007' => 'market-product',      'name_007' => 'Products',               'package_007' => '9'],
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="MarketResourceTableSeeder"
 */