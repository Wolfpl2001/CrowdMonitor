<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function camera() {
        return $this->hasOne(Camera::class);
    }
    public function evenementVeranderingen() {
        return $this->hasMany(EvenementVeranderingen::class);
    }
}
