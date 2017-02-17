<?php

namespace App\Kraken\Offer;

use Illuminate\Database\Eloquent\Model;

class OfferItem extends Model
{
    protected $fillable = ['name', 'offer_item_type_id', 'details', 'tags', 'price', 'short'];

    public function offerCategory()
    {
        return $this->belongsTo('App\Kraken\Offer\OfferCategory');
    }

    public function offerItemType()
    {
        return $this->belongsTo('App\Kraken\Offer\OfferItemType');
    }

    public function pictogram()
    {
        return $this->morphOne('App\Kraken\Core\Pictogram', 'pictogramable');
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }
}
