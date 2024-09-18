<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Camera extends Model
{
    public function evenement()
    {
        return $this->belongsTo(Evenement::class);
    }
}
