<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GitHubIssuesTask extends Model
{
    //
     public function company(){
	  return $this->belongsTo('App\Company');
	}
}
