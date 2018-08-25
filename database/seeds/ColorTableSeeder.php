<?php

use Illuminate\Database\Seeder;

class ColorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [

            ['id' => 1, 'color' => 'black'],
            ['id' => 2, 'color' => 'white'],
            ['id' => 3, 'color' => 'blue'],
        ];

        foreach ($items as $item) {
            \App\Color::create($item);
        }
    }
}
