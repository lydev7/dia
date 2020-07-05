<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Signal extends Model
{
    protected $fillable = ['message_id', 'attribute_id', 'value'];

    public function message()
    {
        return $this->belongsTo(Message::class);
    }

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
}
