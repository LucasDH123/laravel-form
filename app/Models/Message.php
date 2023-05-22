<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $attributes = array(
        'message' => '',
        'from_user' => 0,
        'to_user' => 0,
        'time' => '',
        'date' => ''
    );
    protected $table = 'message';
    protected $primaryKey = 'message_id';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
