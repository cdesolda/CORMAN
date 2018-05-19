<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    //
    protected $hidden = ['created_at','updated_at'];

    public function researchGroups(){
        return $this->belongsToMany('App\ResearchGroup','research_groups_office');
    }

}