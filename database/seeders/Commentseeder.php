<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Comment;
use Illuminate\Support\Str;

class Commentseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 200; $i++) {
            Comment::create([
                'title' => Str::random(7),
                'content' => Str::random(15),
                'user_id' => \rand(1, 50),
                'post_id' => \rand(1, 100)
                ]);
        }
    }
}
