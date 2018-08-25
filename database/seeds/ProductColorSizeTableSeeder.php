<?php

use Illuminate\Database\Seeder;

class ProductColorSizeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [

            // product 1

            ['id' => 1, 'product_id' => 1, 'color_id' => 1, 'size_id' => 1],
            ['id' => 2, 'product_id' => 1, 'color_id' => 2, 'size_id' => 2],
            ['id' => 3, 'product_id' => 1, 'color_id' => 3, 'size_id' => 3],
            ['id' => 4, 'product_id' => 1, 'color_id' => 4, 'size_id' => 4],

            // product 2

            ['id' => 5, 'product_id' => 2, 'color_id' => 1, 'size_id' => 1],
            ['id' => 6, 'product_id' => 2, 'color_id' => 2, 'size_id' => 2],
            ['id' => 7, 'product_id' => 2, 'color_id' => 3, 'size_id' => 3],
            ['id' => 8, 'product_id' => 2, 'color_id' => 4, 'size_id' => 4],

        ];

        foreach ($items as $item) {
            \App\ProductColorSize::create($item);
        }
    }
}
