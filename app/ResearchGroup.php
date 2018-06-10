<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ResearchGroup extends Model
{
    use Notifiable;

    protected $fillable = ([
    'id'
    ]);

    public function users(){
        return $this->belongsToMany(
            'App\User',
            'user_research_groups'
        );
    }

    public function members(){
        return $this->belongsToMany(
            'App\User',
            'user_research_groups'
        )->wherePivot('state','accepted');
    }

    public function invited(){
        return $this->belongsToMany(
            'App\User',
            'user_research_groups'
        )->wherePivot('state','pending');
    }

    public function admins(){
        return $this->belongsToMany(
            'App\User',
            'user_research_groups'
        )->wherePivot('role','admin');
    }

    public function research_lines(){
        return $this->belongsToMany(
            'App\ResearchLine',
            'research_groups_research_line'
        );
    }

    public function offices(){
        return $this->belongsToMany(
            'App\Office',
            'research_groups_office'
        );
    }

    public function shares(){
        return $this->hasMany(
            'App\PublicationResearchGroup',
            'rgroup_id'
        );
    }
}

