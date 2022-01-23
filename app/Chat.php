<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = ['senderid','sendername','receiverid','message','is_seen'];
}
