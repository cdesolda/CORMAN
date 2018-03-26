<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['name','user_id'];
    public function publications(){
        return $this->belongsToMany('App\Publication', 'author_publication');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
     public function isCormanMember(){
        return $this->user_id!=null;
    }

}
