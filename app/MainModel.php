<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainModel extends Model
{
    protected $guarded = [];
    protected $connection = 'main';
}
