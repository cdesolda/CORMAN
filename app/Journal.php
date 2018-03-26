<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    //
    protected $primaryKey='publication_id';
   
    public function publication(){
        return $this->belongsTo('App\Publication');
    }
}
