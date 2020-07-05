<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded = [];

    public function signals()
    {
        return $this->hasMany(Signal::class);
    }

    public function message()
    {
        return $this->belongsTo(Message::class);
    }

    public function responses()
    {
        return $this->hasMany(Message::class);
    }
}
