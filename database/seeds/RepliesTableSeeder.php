<?php

use Illuminate\Database\Seeder;

class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $r1 = [
            'content' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate omnis voluptatibus ex deleniti quibusdam doloribus itaque mollitia ab dolor nisi! Tempora laudantium velit ipsa dolorum! Adipisci atque eveniet quisquam laudantium?",
            'discussion_id' => 1,
            'user_id' => 2
        ];

        $r2 = [
            'content' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate omnis voluptatibus ex deleniti quibusdam doloribus itaque mollitia ab dolor nisi! Tempora laudantium velit ipsa dolorum! Adipisci atque eveniet quisquam laudantium?",
            'discussion_id' => 2,
            'user_id' => 2
        ];

        $r3 = [
            'content' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate omnis voluptatibus ex deleniti quibusdam doloribus itaque mollitia ab dolor nisi! Tempora laudantium velit ipsa dolorum! Adipisci atque eveniet quisquam laudantium?",
            'discussion_id' => 3,
            'user_id' => 2
        ];

        $r4 = [
            'content' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate omnis voluptatibus ex deleniti quibusdam doloribus itaque mollitia ab dolor nisi! Tempora laudantium velit ipsa dolorum! Adipisci atque eveniet quisquam laudantium?",
            'discussion_id' => 1,
            'user_id' => 1
        ];


        App\Reply::create($r1);
        App\Reply::create($r2);
        App\Reply::create($r3);
        App\Reply::create($r4);
        

    }
}
