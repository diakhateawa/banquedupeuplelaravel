<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = array('nom', 'prenom','addresse','telephone');
    public static $rules = array('nom'=>'required|min:2', 
                                 'prenom'=>'required|min:3',
                                 'addresse'=>'required|min:9',
                                 'telephone'=>'required|min:9'
                                );

    public function compte()
    {
        return $this->hasMany('App\Compte');
    }
}
