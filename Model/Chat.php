<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    //
    protected $table = "Chat";

     public function user(){
    	return $this->belongsTo('App\User','by','id');
    }
}
