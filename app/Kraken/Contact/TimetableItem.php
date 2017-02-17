<?php

namespace App\Kraken\Contact;

use Illuminate\Database\Eloquent\Model;

class TimetableItem extends Model
{
    protected $fillable = ['name', 'start_time', 'end_time'];

    public function timetable()
    {
        return $this->belongsTo('App\Kraken\Contact\Timetable');
    }
}