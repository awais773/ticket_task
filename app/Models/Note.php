<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'title','text','workspace','color', 'type', 'assign_to','created_by','building_name','building_number'
    ];

    // protected $guarded = [];
    // public function users()
    // {
    //     return $this->hasOne('App\Models\User', 'id', 'created_by');
    // }

    public function users()
    {
        return User::whereIn('id',explode(',',$this->created_by))->get();
    }
}
