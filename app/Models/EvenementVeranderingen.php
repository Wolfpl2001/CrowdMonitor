<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvenementVeranderingen extends Model
{
    protected $table = 'evenementveranderingen';
    public function eventRelation() {
        return $this->belongsTo(Evenement::class);
    }
}
