<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
  use SoftDeletes;
  
  protected $guarded = ['id', 'user_id', 'created_at', 'updated_at', 'deleted_at'];
  
  protected $dates = ['deleted_at'];
  
  public function modules() 
  {
    return $this->belongsToMany('App\Kraken\Core\Module');
  }
  
  public function description()
  {
    return $this->hasOne('App\Kraken\Description\Description');
  }

  public function offer()
  {
    return $this->hasOne('App\Kraken\Offer\Offer');
  }

  public function contact()
  {
    return $this->hasOne('App\Kraken\Contact\Contact');
  }
}
