<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adres extends Model
{
    protected $table = 'adres';

    public function evenementRelation() {
        return $this->hasMany(Evenement::class);
    }
}