<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $attributes = array(
        'title' => '',
        'content' => '',
        'rating' => 0,
        'user_id' => ''
    );
    protected $table = 'post';
    protected $primaryKey = 'id';

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
