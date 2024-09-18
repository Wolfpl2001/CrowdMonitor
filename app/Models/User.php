<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function evenement() {
        return $this->hasMany(Evenement::class);
    }
}
