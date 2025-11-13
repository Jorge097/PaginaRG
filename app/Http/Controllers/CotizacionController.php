<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cotizacion;
use App\Services\OutlookMailService;

class CotizacionController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'Name' => 'required|string|max:255',
            'Phone' => 'required|string|max:20',
            'Email' => 'required|email',
            'Location' => 'required|string|max:255',
            'Crop' => 'required|string|max:255',
            'Surface' => 'required|string|max:255',
            'Comment' => 'nullable|string',
        ]);

        // Guardar y capturar el modelo creado
        $cotizacion = Cotizacion::create($validated);

        // Enviar correo
        $mailService = new OutlookMailService();

        $to = 'jORGE.SILVA@RgFoliares.com';
        $subject = 'Nueva Cotización Recibida';
        $body = "
            <h2>¡Nueva cotización recibida!</h2>
            <p><strong>Nombre:</strong> {$cotizacion->Name}</p>
            <p><strong>Teléfono:</strong> {$cotizacion->Phone}</p>
            <p><strong>Correo:</strong> {$cotizacion->Email}</p>
            <p><strong>Ubicación:</strong> {$cotizacion->Location}</p>
            <p><strong>Cultivo:</strong> {$cotizacion->Crop}</p>
            <p><strong>Superficie:</strong> {$cotizacion->Surface}</p>
            <p><strong>Comentarios:</strong> {$cotizacion->Comment}</p>
        ";

        $mailService->sendMail($to, $subject, $body);

        return redirect()->back()->with('success', '¡Cotización enviada con éxito!');
    }
}
