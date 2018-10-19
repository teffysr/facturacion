<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
   protected $table = 'invoice';
   protected $primarykey = 'id';
   protected $fillable = ['id','number','company_id','client_id','subTotal', 'iva','total'];

   public function company()
    {
        return $this->belongsto(Company::class, 'foreign_key');
    }

    public function client()
    {
        return $this->belongsto(Client::class, 'foreign_key');
    }
}
