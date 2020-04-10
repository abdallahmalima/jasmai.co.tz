<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    //
    protected $guarded=[ 
    	'id','created_at', 'updated_at',
    ];


    public function subCategory(){
        
        return $this->belongsTo('App\SubCategory');
    }
}
