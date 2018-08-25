<?php

use Illuminate\Database\Seeder;

class ProductImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [

            ['id' => 1, 'product_id' => 1, 'file_name' => 'apple.jpeg'],
            ['id' => 2, 'product_id' => 1, 'file_name' => 'apple.jpeg'],

            ['id' => 3, 'product_id' => 1, 'file_name' => 'orange.jpeg'],
            ['id' => 4, 'product_id' => 1, 'file_name' => 'orange.jpeg'],
        ];

        foreach ($items as $item) {
            \App\ProductImage::create($item);
        }
    }
}
