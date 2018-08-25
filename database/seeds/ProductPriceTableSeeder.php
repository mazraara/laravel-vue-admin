<?php

use Illuminate\Database\Seeder;

class ProductPriceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [

            ['id' => 1, 'product_id' => 1, 'price' => 100, 'min_quantity' => 100, 'max_quantity' => 200],
            ['id' => 2, 'product_id' => 1, 'price' => 200, 'min_quantity' => 10, 'max_quantity' => 99],

            ['id' => 3, 'product_id' => 2, 'price' => 10, 'min_quantity' => 100, 'max_quantity' => 200],
            ['id' => 4, 'product_id' => 2, 'price' => 20, 'min_quantity' => 10, 'max_quantity' => 99],
        ];

        foreach ($items as $item) {
            \App\ProductQuantityPrice::create($item);
        }
    }
}
