<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        "name",
        "location",
        "description",
        "start_dt",
        "end_dt"
    ];
}
