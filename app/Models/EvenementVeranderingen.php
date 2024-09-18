<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvenementVeranderingen extends Model
{
    public function evenement() {
        return $this->belongsTo(Evenement::class);
    }
}
