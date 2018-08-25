<?php

use Illuminate\Database\Seeder;

class SizeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [

            ['id' => 1, 'size' => 'S'],
            ['id' => 2, 'size' => 'M'],
            ['id' => 3, 'size' => 'L'],
            ['id' => 4, 'size' => 'XL'],
            ['id' => 5, 'size' => 'XXL'],
        ];

        foreach ($items as $item) {
            \App\Size::create($item);
        }
    }
}
