<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    //
    protected $guarded=[ 
    	'id','created_at', 'updated_at',
    ];



    public function works(){
        
        return $this->hasMany('App\Work');
    }
}
