<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::create([
            "user_id" => "1",
            "post_id" => "1",
            "comment_content" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit."
        ]);
    }
}
