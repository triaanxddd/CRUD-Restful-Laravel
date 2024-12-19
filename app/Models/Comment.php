<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function commentator(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
