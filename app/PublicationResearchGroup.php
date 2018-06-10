<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicationResearchGroup extends Model
{

    protected $fillable = [
        'publication_id','user_id', 'rgroup_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function rgroup(){
        return $this->belongsTo('App\ResearchGroup');
    }

    public function rline(){
        return $this->belongsTo('App\ResearchLine');
    }

    public function publication(){
        return $this->belongsTo('App\Publication');
    }
}
