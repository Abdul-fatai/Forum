<?php

use Illuminate\Database\Seeder;

class DiscussionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $t1 = "Lorem ipsum, dolor sit amet consectetur adipisicing elit.";
        $t2 = "Perspiciatis et sequi error nam dolores accusamus cupiditate vel.";
        $t3 = "amet iure, voluptatibus ut soluta sunt laboriosam ex consequuntur.";
        $t4 = "Lorem ipsum, dolor sit amet consectetur adipisicing elit.";
        

        $d1 = [
            'title' => $t1,
            'content' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate omnis voluptatibus ex deleniti quibusdam doloribus itaque mollitia ab dolor nisi! Tempora laudantium velit ipsa dolorum! Adipisci atque eveniet quisquam laudantium?",
            'channel_id' => 1,
            'user_id' => 2,
            'slug' => str_slug($t1)
        ];

        $d2 = [
            'title' => $t2,
            'content' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate omnis voluptatibus ex deleniti quibusdam doloribus itaque mollitia ab dolor nisi! Tempora laudantium velit ipsa dolorum! Adipisci atque eveniet quisquam laudantium?",
            'channel_id' => 1,
            'user_id' => 2,
            'slug' => str_slug($t2)
        ];

        $d3 = [
            'title' => $t3,
            'content' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate omnis voluptatibus ex deleniti quibusdam doloribus itaque mollitia ab dolor nisi! Tempora laudantium velit ipsa dolorum! Adipisci atque eveniet quisquam laudantium?",
            'channel_id' => 1,
            'user_id' => 1,
            'slug' => str_slug($t3)
        ];

        $d4 = [
            'title' => $t4,
            'content' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate omnis voluptatibus ex deleniti quibusdam doloribus itaque mollitia ab dolor nisi! Tempora laudantium velit ipsa dolorum! Adipisci atque eveniet quisquam laudantium?",
            'channel_id' => 1,
            'user_id' => 2,
            'slug' => str_slug($t4)
        ];

        App\Discussion::create($d1);
        App\Discussion::create($d2);
        App\Discussion::create($d3);
        App\Discussion::create($d4);

    }
}
