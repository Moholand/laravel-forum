<?php

namespace Database\Seeders;

use App\Models\Discussion;
use Illuminate\Support\Str;
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
        $t1 = 'Laravel Restful Api';
        $t2 = 'Frontend Master';
        $t3 = 'Backend with JS';
        $t4 = 'The Best Framework';

        $d1 = [
            'user_id' => 1,
            'title' => $t1,
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            'slug' => Str::slug($t1),
            'channel_id' => 1
        ];

        $d2 = [
            'user_id' => 1,
            'title' => $t2,
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            'slug' => Str::slug($t2),
            'channel_id' => 2
        ];

        $d3 = [
            'user_id' => 2,
            'title' => $t3,
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            'slug' => Str::slug($t3),
            'channel_id' => 4
        ];

        $d4 = [
            'user_id' => 2,
            'title' => $t4,
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            'slug' => Str::slug($t4),
            'channel_id' => 3
        ];

        Discussion::create($d1);
        Discussion::create($d2);
        Discussion::create($d3);
        Discussion::create($d4);
    }
}
