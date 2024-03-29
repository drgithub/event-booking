<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $fillable = [
        "email",
        "event_id",
        "fkey",
        "status"
    ];

    public function event()
    {
        return $this->belongsTo('App\Event');
    }
}
