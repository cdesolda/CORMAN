<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicationGroup extends Model
{

    protected $fillable = [
        'publication_id','user_id', 'group_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function group(){
        return $this->belongsTo('App\Group');
    }

    public function publication(){
        return $this->belongsTo('App\Publication');
    }
}
