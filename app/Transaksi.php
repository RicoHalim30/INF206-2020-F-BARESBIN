<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $guarded = ['id'];

    public function pengepul(){
    	return $this->belongsTo('App\User', 'pengepul');
    }

    public function pengumpul(){
    	return $this->belongsTo('App\User', 'pengumpul');
    }
}
