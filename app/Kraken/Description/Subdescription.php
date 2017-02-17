<?php

namespace App\Kraken\Description;

use Illuminate\Database\Eloquent\Model;

class Subdescription extends Model
{
  protected $fillable = ['name', 'details'];
  
  public function description()
  {
    return $this->belongsTo('App\Kraken\Description\Description');
  }

  public function setNameAttribute($value)
  {
    $this->attributes['name'] = $value;
    $this->attributes['slug'] = str_slug($value);
  }
}
