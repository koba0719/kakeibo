<?php

use Illuminate\Database\Seeder;

class CapitalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('capitals')->insert([
            'capital' => '支出',
        ]);

        DB::table('capitals')->insert([
            'capital' => '収入',
        ]);
    }
}
