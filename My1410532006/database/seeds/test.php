<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Model\post;

class test extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        post::truncate();
        $a = array("心得","問題","討論","分享");
        $faker = Faker::create('zh_TW');
        foreach (range(1,50) as $index) {
            post::create([
                'ar_name' => $faker->name,
                'ar_sort' => $a[array_rand($a,1)],
                'ar_text' => $faker->paragraph,
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ]);
        }
    }
}
