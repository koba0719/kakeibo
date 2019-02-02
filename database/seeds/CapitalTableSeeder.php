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
        DB::table('capital')->insert([
            'user_id' => 1,
            'capital' => 300000,
            'year' => 2019,
            'month' => 2,
        ]);
    }
}
