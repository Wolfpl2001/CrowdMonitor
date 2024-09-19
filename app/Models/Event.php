<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $fillable = [
        'name',
        'max_visitors',
        'start',
        'end',
        'street',
        'house_number',
        'postal_code',
        'city',
        'country_code',
        'user_id',
        'created_at',
        'updated_at',
    ];



    public function user() {
        return $this->belongsTo(User::class);
    }
    public function cam() {
        return $this->hasOne(Cam::class);
    }
    public function eventChangelog() {
        return $this->hasMany(EventChangelog::class);
    }
}
