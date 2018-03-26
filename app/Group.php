<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Group extends Model
{
    use Notifiable;

    protected $fillable = ([
    'id'
    ]);

    public function users(){
        return $this->belongsToMany(
            'App\User',
            'user_group'
        );
    }

    public function members(){
        return $this->belongsToMany(
            'App\User',
            'user_group'
        )->wherePivot('state','accepted');
    }

    public function invited(){
        return $this->belongsToMany(
            'App\User',
            'user_group'
        )->wherePivot('state','pending');
    }

    public function admins(){
        return $this->belongsToMany(
            'App\User',
            'user_group'
        )->wherePivot('role','admin');
    }

    public function topics(){
        return $this->belongsToMany(
            'App\Topic',
            'topic_group'
        );
    }

    public function shares(){
        return $this->hasMany(
            'App\PublicationGroup'
        );
    }
}

