<?php

use Illuminate\Database\Seeder;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channel1 = ['title' => 'Laravel', 'slug' => str_slug('Laravel')];
        $channel2 = ['title' => 'VueJs', 'slug' => str_slug('VueJs')];
        $channel3 = ['title' => 'ReactJs', 'slug' => str_slug('ReactJs')];
        $channel4 = ['title' => 'Python', 'slug' => str_slug('Python')];
        $channel5 = ['title' => 'Ruby', 'slug' => str_slug('Ruby')];
        $channel6 = ['title' => 'Lumen', 'slug' => str_slug('Lumen')];
        $channel7 = ['title' => 'Wordpress', 'slug' => str_slug('Wordpress')];


        App\Channel::create($channel1);
        App\Channel::create($channel2);
        App\Channel::create($channel3);
        App\Channel::create($channel4);
        App\Channel::create($channel5);
        App\ Channel::create($channel6);
        App\Channel::create($channel7);

    }
}
