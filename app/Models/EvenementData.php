<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvenementData extends Model
{
    protected $table = 'evenementdata';

    public function eventRelation()
    {
        return $this->belongsTo(Evenement::class);
    }
    protected $fillable =[
        'EvenementID', 'Instroom', 'Uitstroom', 'temperature', 'weather_description', 'Weer'
    ];
}
