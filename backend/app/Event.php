<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $fillable = ['userid', 'name', 'time','location','type','period'];
    protected $table = 'events';
    public $timestamps = false;


}
