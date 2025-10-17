<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    protected $table = 'cotizaciones';

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
