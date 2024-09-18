<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
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
