<?php

namespace App\Kraken\Description;

use Illuminate\Database\Eloquent\Model;

class MediaGallery extends Model
{
  protected $fillable = ['name'];
  
  public function description()
  {
    return $this->belongsTo('App\Kraken\Description\Description');
  }
  
  public function mediaItems()
  {
    return $this->hasMany('App\Kraken\Description\MediaItem');
  }
}
