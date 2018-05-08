<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostGroup extends Model
{
    protected $fillable = [
        'group_id', 'user_id', 'post_content'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function group(){
        return $this->belongsTo('App\Group');
    }

    public function commented(){
        return $this->hasMany(
            'App\PostComment'
        );
    }
}
