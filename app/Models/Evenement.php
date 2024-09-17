<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    protected $table = "evenement";

    protected $fillable =[
        'MaxBezoekers', 'Start', 'Eind', 'AdresID', 'EventNaam', 'Stad', 'UserID',
    ];

    public function adresRelation() {
        return $this->belongsTo(Adres::class);
    }
    public function userRelation() {
        return $this->belongsTo(User::class);
    }
    public function eventdataRelation() {
        return $this->hasOne(EvenementData::class);
    }
    public function eventveranderingRelation() {
        return $this->hasMany(EvenementVeranderingen::class);
    }
}
