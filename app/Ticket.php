<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';

    protected $fillable =[
        'name', 'user_id', 'owner_id', 'description', 'start_in', 'end_in', 'status', 'notes'
    ];
    protected $casts = [
        'start_in' => 'datetime:Y-m-d H:00',
    ];
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

}
