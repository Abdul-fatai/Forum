<?php

use Illuminate\Database\Seeder;

class LikeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $l1 = [
            'user_id' => 2,
            'reply_id' => 2
        ];

        $l2 = [
            'user_id' => 1,
            'reply_id' => 2
        ];

        $l3 = [
            'user_id' => 2,
            'reply_id' => 2
        ];


        App\Like::create($l1);
        App\Like::create($l2);
        App\Like::create($l2);
    }
}
