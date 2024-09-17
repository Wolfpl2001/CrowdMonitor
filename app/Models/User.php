<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';

    public function loginRelation() {
        return $this->hasOne(Login::class);
    }
    public function evenementRelation() {
        return $this->hasMany(Evenement::class);
    }
}
