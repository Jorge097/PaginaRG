<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\MassPrunable;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    use MassPrunable;

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

    /**
     * Aviso de privacidad: las solicitudes se borran a los N meses
     * (config rg.privacidad.retencion_meses). Lo ejecuta `php artisan model:prune`.
     */
    public function prunable(): Builder
    {
        return static::where('created_at', '<=', now()->subMonths((int) config('rg.privacidad.retencion_meses', 6)));
    }
}
