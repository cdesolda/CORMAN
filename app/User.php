<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','created_at','updated_at'
    ];

    public function publications(){
        return $this->belongsToMany('App\Publication','user_publication');
    }

    public function topics(){
        return $this->belongsToMany('App\Topic','user_topic');
    }

    public function groups(){
        return $this->belongsToMany('App\Group','user_group');
    }

    public function researchGroups(){
        return $this->belongsToMany('App\Group','user_research_group');
    }

    public function groupsAsAdmin(){
        return $this->belongsToMany('App\Group','user_group')->wherePivot('role','admin');
    }

    public function groupsAsMember(){
        return $this->belongsToMany('App\Group','user_group')->wherePivot('state','accepted');
    }

    public function researchGroupsAsAdmin(){
        return $this->belongsToMany('App\ResearchGroup','user_research_group')->wherePivot('role','admin');
    }

    public function researchGroupsAsMember(){
        return $this->belongsToMany('App\ResearchGroup','user_research_group')->wherePivot('state','accepted');
    }

    public function randomGroupsAsMember(){
        return $this->belongsToMany('App\Group','user_group')->wherePivot('state','accepted')->inRandomOrder();
    }

    public function groupsAsInvited(){
        return $this->belongsToMany('App\Group','user_group')->wherePivot('state','pending');
    }

    public function randomresearchGroupsAsMember(){
        return $this->belongsToMany('App\ResearchGroup','user_research_group')->wherePivot('state','accepted')->inRandomOrder();
    }

    public function researchGroupsAsInvited(){
        return $this->belongsToMany('App\ResearchGroup','user_research_group')->wherePivot('state','pending');
    }

    public function affiliation(){
        return $this->belongsTo('App\Affiliation');
    }

    public function role(){
        return $this->belongsTo('App\Role');
    }
/*
    public function publication_groups(){
        return $this->hasMany('App\PublicationGroup');
    }
*/
    public function author(){
        return $this->hasOne('App\Author');
    }

    public function shares(){
        return $this->hasMany('App\PublicationGroup');
    }

    public function posted(){
        return $this->hasMany('App\PostGroup');
    }

    public function commented(){
        return $this->hasMany('App\PostComment');
    }
}
