<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(RoleSeed::class);
        $this->call(PermissionSeed::class);
        $this->call(RoleSeedPivot::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(ProductPriceTableSeeder::class);
        $this->call(ProductImageTableSeeder::class);

    }
}
