<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('ja_JP');

        foreach(range(1, 3) as $number) {
            DB::table('post')->insert([
                'user_id' => 1,
                'category_id' => 100 + $number,
                'price' => 300,
                'memo' => '衝動買い',
                'store' => $faker->company,
                'post_date' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
