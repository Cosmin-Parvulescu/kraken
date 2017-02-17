<?php

namespace App\Kraken\Core;

use Illuminate\Database\Eloquent\Model;

class Pictogram extends Model
{
  protected $guarded = ['id', 'created_at', 'updated_at'];
  
  public function pictogramable()
  {
    return $this->morphTo();
  }
}
