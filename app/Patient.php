<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'name', 'last_name', 'place_id', 'umsn', 'details',
    ];

    public function place() {
        return $this->belongsTo('App\Place');
    }
}
