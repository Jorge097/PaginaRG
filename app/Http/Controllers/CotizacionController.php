<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cotizacion;
use Illuminate\Support\Facades\Mail;

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

        $cotizacion = Cotizacion::create($validated);

        // Enviar correo usando SMTP de Laravel
        $c = array_map(fn ($v) => e($v ?? ''), $cotizacion->only([
            'Name', 'Phone', 'Email', 'Location', 'Crop', 'Surface', 'Comment',
        ]));

        // Si el correo falla, la cotización ya quedó guardada: se registra el error
        // en el log y el cliente ve igualmente el mensaje de éxito.
        try {
        Mail::send([], [], function ($message) use ($c) {
            $message->to('jorge.silva@rgfoliares.com')
                ->subject('Nueva Cotización Recibida')
                ->html("
                    <h2>¡Nueva cotización recibida!</h2>
                    <p><strong>Nombre:</strong> {$c['Name']}</p>
                    <p><strong>Teléfono:</strong> {$c['Phone']}</p>
                    <p><strong>Correo:</strong> {$c['Email']}</p>
                    <p><strong>Ubicación:</strong> {$c['Location']}</p>
                    <p><strong>Cultivo:</strong> {$c['Crop']}</p>
                    <p><strong>Superficie:</strong> {$c['Surface']}</p>
                    <p><strong>Comentarios:</strong> {$c['Comment']}</p>
                ");
        });
        } catch (\Throwable $e) {
            report($e);
        }

        return redirect()->back()->with('success', '¡Cotización enviada con éxito!');
    }
}
