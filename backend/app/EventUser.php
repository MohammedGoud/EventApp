<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventUser extends Model
{
    //
    protected $fillable = ['event_id', 'name', 'email'];
    protected $table = 'events_users';
    public $timestamps = false;


}
