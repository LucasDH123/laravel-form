<?php

namespace App\Models;

use Date;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $attributes = array(
        'message' => '',
        'sender_id' => 0,
        'recipient_id' => 0,
        
    );
    protected $table = 'private_messages';
    protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
