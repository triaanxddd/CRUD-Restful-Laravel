<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create([
            "title" => "Judul Baru",
            "news_content" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos saepe vel commodi nisi cumque non quidem nemo dolor quo. Sint incidunt impedit mollitia officia, reiciendis eveniet in excepturi harum voluptate!",
            "author" => "1"
        ]);
    }
}
