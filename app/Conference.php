<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    protected $primaryKey='publication_id';
    
    public function publication(){
        return $this->belongsTo('App\Publication');
    }
}
