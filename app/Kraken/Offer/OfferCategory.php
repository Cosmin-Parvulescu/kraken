<?php

namespace App\Kraken\Offer;

use Illuminate\Database\Eloquent\Model;

class OfferCategory extends Model
{
    protected $fillable = ['name', 'details', 'short'];

    public function offer()
    {
        return $this->belongsTo('App\Kraken\Offer\Offer');
    }

    public function pictogram()
    {
        return $this->morphOne('App\Kraken\Core\Pictogram', 'pictogramable');
    }

    public function offerItems()
    {
        return $this->hasMany('App\Kraken\Offer\OfferItem');
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }
}
