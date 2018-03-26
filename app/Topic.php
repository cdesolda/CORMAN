<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    //
    protected $hidden = ['created_at','updated_at'];

    public function users(){
        return $this->belongsToMany('App\User','user_topic');
    }
    
    public function publications(){
        return $this->belongsToMany('App\Publication','topic_publication');
    }

    public function groups(){
        return $this->belongsToMany('App\Group','topic_group');
    }

}
