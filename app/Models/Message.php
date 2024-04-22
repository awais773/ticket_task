<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'ch_messages';
    protected $guarded = [];
    public function from_data(){
        return $this->hasOne('App\Models\User','id','from_id');
    }
}
