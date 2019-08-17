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
        $channel1 = ['title' => 'Laravel'];
        $channel2 = ['title' => 'VueJs'];
        $channel3 = ['title' => 'ReactJs'];
        $channel4 = ['title' => 'Python'];
        $channel5 = ['title' => 'Ruby'];
        $channel6 = ['title' => 'Lumen'];
        $channel7 = ['title' => 'Wordpress'];


        App\Channel::create($channel1);
        App\Channel::create($channel2);
        App\Channel::create($channel3);
        App\Channel::create($channel4);
        App\Channel::create($channel5);
        App\ Channel::create($channel6);
        App\Channel::create($channel7);

    }
}
