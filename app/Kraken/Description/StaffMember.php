<?php

namespace App\Kraken\Description;

use Illuminate\Database\Eloquent\Model;

class StaffMember extends Model
{
  protected $fillable = ['name', 'details', 'short'];
  
  public function staff()
  {
    return $this->belongsTo('App\Kraken\Description\Staff');
  }
  
  public function pictogram()
  {
    return $this->morphOne('App\Kraken\Core\Pictogram', 'pictogramable');
  }
}