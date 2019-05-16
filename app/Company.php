<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //

       protected $fillable = [
        'name','user_id',
    ];

     public function user(){
        return $this->belongsTo('App\User');
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
