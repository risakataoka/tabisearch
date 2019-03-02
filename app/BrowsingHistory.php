<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrowsingHistory extends Model
{
  protected $primaryKey = "id";

  public function user()
 {
     return $this->belongsTo('App\User');
 }
}
