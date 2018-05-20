<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResearchLine extends Model
{
    protected $table = 'research_line';
    protected $hidden = ['created_at','updated_at'];

    public function researchGroups(){
        return $this->belongsToMany('App\ResearchGroup','research_groups_research_line');
    }

}
