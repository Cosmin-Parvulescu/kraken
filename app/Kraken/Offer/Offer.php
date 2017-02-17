<?php

namespace App\Kraken\Offer;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = ['name', 'details', 'short'];

    public function tenant()
    {
        return $this->belongsTo('App\Tenant');
    }

    public function offerCategories()
    {
        return $this->hasMany('App\Kraken\Offer\OfferCategory');
    }

    public function offerPromotions()
    {
        return $this->hasMany('App\Kraken\Offer\OfferPromotion');
    }
}
