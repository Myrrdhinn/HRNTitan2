<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\MainModel;

class Speakers extends MainModel
{

	
     public function speakers_order(){
        return $this->hasOne('App\SpeakersOrder', 'speaker_id');
    }

     public function speakers_order_special(){
        return $this->hasOne('App\SpeakersOrderSpecial', 'speaker_id');
    }

     public function speakers_status(){
        return $this->hasOne('App\SpeakersStatus', 'speaker_id');
    }

     public function speakers_status_special(){
        return $this->hasOne('App\SpeakersStatusSpecial', 'speaker_id');
    }

}
