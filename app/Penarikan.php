<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penarikan extends Model
{
    protected $table = 'penarikan';
    protected $guarded = ['id'];

    public function pengumpul(){
    	return $this->belongsTo('App\User',  'user_id');
    }
}
