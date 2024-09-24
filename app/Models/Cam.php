<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cam extends Model
{
    protected $table = 'cams';
    protected $fillable = [
    'event_id',
    'inflow',
    'outflow',
    'temperature',
    'weather_code'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
