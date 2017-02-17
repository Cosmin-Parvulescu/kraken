<?php

namespace App\Kraken\Description;

use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    protected $fillable = ['name', 'details', 'short'];

    public function subdescriptions()
    {
        return $this->hasMany('App\Kraken\Description\Subdescription');
    }

    public function staff()
    {
        return $this->hasOne('App\Kraken\Description\Staff');
    }

    public function mediaGallery()
    {
        return $this->hasOne('App\Kraken\Description\MediaGallery');
    }

    public function tenant()
    {
        return $this->belongsTo('App\Tenant');
    }
}
