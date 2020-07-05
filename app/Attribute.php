<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $fillable = ['attribute'];

    public function signals()
    {
        return $this->hasMany(Signal::class);
    }
}
