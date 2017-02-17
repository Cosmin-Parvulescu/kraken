<?php

namespace App\Kraken\Description;

use Illuminate\Database\Eloquent\Model;

class MediaItem extends Model
{
  protected $fillable = ['name', 'details', 'mime', 'path'];
  
  public function mediaGallery()
  {
    return $this->belongsTo('App\Kraken\Description\MediaGallery');
  }
}
