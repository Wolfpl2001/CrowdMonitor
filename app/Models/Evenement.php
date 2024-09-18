<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'MaxBezoekers',
    ];

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
