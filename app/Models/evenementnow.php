<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class evenementnow extends Model
{
    protected $table = "evenementnow";

    protected $fillable =[
        'Id', 'EvenementId', 'Bezoekers'
    ];
}
