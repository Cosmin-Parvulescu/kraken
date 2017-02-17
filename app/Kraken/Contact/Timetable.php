<?php

namespace App\Kraken\Contact;

use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    protected $fillable = ['name', 'details'];

    public function contact()
    {
        return $this->belongsTo('App\Kraken\Contact\Contact');
    }

    public function timetableItems()
    {
        return $this->hasMany('App\Kraken\Contact\TimetableItem');
    }
}
