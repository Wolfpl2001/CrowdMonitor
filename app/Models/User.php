<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function event() {
        return $this->hasMany(Event::class);
    }
}
