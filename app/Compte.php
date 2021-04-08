<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compte extends Model
{
    protected $fillable = array('clients_id', 'users_id','numero', 'solde');
    public static $rules = array('clients_id'=>'required|integer',
                                 'users_id'=>'required|bigInteger',
                                 'numero'=>'required|min:10', 
                                 'solde'=>'required|min:9',
                                );

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function clients()
    {
        return $this->belongsTo('App\Client');
    }
}
