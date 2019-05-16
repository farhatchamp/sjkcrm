<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
      protected $fillable = [
        'name','company_id','title', 'phone_numbers','email_address','notes'
    ];

    public function user(){
	  return $this->belongsTo('App\User');
	}

	public function company(){
	  return $this->belongsTo('App\Company');
	}
}
