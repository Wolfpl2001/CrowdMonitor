<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';

    public function evenementRelation() {
        return $this->hasMany(Evenement::class);
    }
}
