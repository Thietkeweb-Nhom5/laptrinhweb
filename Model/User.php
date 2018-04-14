<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'email', 'password',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	public function comment(){
		return $this->hasMany('App\Comment','idUser','id');
	}

	public function chat(){
		return $this->hasMany('App\Chat','idUser','id');
	}

	public function report(){
		return $this->hasMany('App\Report','idUser','id');
	}

	public function tintuc(){
		return $this->hasMany('App\TinTuc','by','id');
	}

}
