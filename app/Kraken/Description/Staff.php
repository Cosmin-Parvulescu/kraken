<?php

namespace App\Kraken\Description;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
  protected $fillable = ['name', 'details'];
  
  public function description()
  {
    return $this->belongsTo('App\Kraken\Description\Description');
  }
  
  public function staffMembers()
  {
    return $this->hasMany('App\Kraken\Description\StaffMember');
  }
}
