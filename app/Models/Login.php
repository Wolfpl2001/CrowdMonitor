<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    protected $table = 'login';

    public function userRelation() {
        return $this->belongsTo(User::class);
    }
}
