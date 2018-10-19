<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'client';
    protected $primarykey = 'id';
    protected $fillable = ['id','name','cuit','company_id'];

    public function company()
    {
        return $this->belongsto(Company::class, 'foreign_key');
    }

    public function invoice(){
    	return $this->hasMany(Invoice::class);
    }
}
