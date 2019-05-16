<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
        return $this->belongsToMany('App\Role');
    }

    public function contact(){
        return $this->hasMany('App\Contact');
    }

    public function ClientDomainInformation(){
        return $this->hasMany('App\ClientDomainInformation');
    }

    public function CustomerBillingInformation(){
        return $this->hasMany('App\CustomerBillingInformation');
    }

    public function DriveDocuments(){
        return $this->hasMany('App\DriveDocuments');
    }

    public function EmailInformation(){
        return $this->hasMany('App\EmailInformation');
    }


    public function GitHubIssuesTask(){
        return $this->hasMany('App\GitHubIssuesTask');
    }

    public function InteractionLog(){
        return $this->hasMany('App\InteractionLog');
    }

    public function MeetingNote(){
        return $this->hasMany('App\MeetingNote');
    }

    public function Note(){
        return $this->hasMany('App\Note');
    }


    public function ServerInformation(){
        return $this->hasMany('App\ServerInformation');
    }

    public function SocialLinks(){
        return $this->hasMany('App\SocialLinks');
    }

    public function companies(){
        return $this->hasMany('App\Company');
    }
}
