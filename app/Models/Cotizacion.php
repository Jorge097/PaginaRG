<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    protected $table = 'Cotizaciones'; // así se creó en la migración; en Linux MySQL distingue mayúsculas

    protected $fillable = [
    'Name',
    'Phone',
    'Email',
    'Location',
    'Crop',
    'Surface',
    'Comment',
    ];

}
