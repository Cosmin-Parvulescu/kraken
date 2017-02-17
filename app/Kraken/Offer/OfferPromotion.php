<?php

namespace App\Kraken\Offer;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class OfferPromotion extends Model
{
    protected $fillable = ['name', 'details'];
    protected $dates = ['created_at', 'updated_at', 'start_date', 'end_date'];

    public function offer()
    {
        return $this->belongsTo('App\Kraken\Offer\Offer');
    }

    public function pictogram()
    {
        return $this->morphOne('App\Kraken\Core\Pictogram', 'pictogramable');
    }

    public function scopeActive($query)
    {
        return $query
            ->where(function ($q) {
                $q->where('start_date', '=', '0000-00-00')
                    ->orWhere('start_date', '<=', [Carbon::now()->toDateString()]);
            })->where(function ($q) {
                $q->where('end_date', '=', '0000-00-00')
                    ->orWhere('end_date', '>=', [Carbon::now()->toDateString()]);
            });
    }
}
