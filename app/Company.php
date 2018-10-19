<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company';
    protected $primarykey = 'id';
    protected $fillable = ['id','name','businessName','cuit'];

    public function client(){
    	return $this->hasMany(Client::class);
    }

    public function invoice(){
    	return $this->hasMany(Invoice::class);
    }
}
