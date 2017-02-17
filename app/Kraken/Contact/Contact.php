<?php

namespace App\Kraken\Contact;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['name', 'details', 'short', 'telephone', 'email'];

    public function tenant()
    {
        return $this->belongsTo('App\Tenant');
    }

    public function timetable()
    {
        return $this->hasOne('App\Kraken\Contact\Timetable');
    }
}
