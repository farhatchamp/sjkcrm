<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientDomainInformation extends Model
{
    //

	 protected $fillable = [
        'company_id','list_of_domain','domain_owner'
    ];

    public function company(){
	  return $this->belongsTo('App\Company');
	}
}
