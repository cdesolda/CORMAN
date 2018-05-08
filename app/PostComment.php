<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    protected $fillable = [
        'post_group_id', 'user_id', 'comment_content'
    ];

    public function post(){
        return $this->belongsTo('App\PostGroup');
    }
    
    public function user(){
        return $this->belongsTo('App\User');
    }

}
