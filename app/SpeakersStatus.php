<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\MainModel;

class SpeakersStatus extends MainModel
{

    
     public function speakers(){
     
        return $this->belongsto('App\Speakers');
    }

}
