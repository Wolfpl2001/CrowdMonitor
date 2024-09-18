<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',         // Example field
        'date',         // Example field
        'Maxvisitors', // Add this line for mass assignment
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
