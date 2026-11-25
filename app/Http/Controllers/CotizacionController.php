<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cotizacion;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class CotizacionController extends Controller
{
    public function store(Request $request)
    {
        // Vuelve al formulario (#cotizar) de la página desde la que se envió.
        // Solo se acepta una URL del propio sitio (evita redirecciones abiertas vía Referer).
        $previous = url()->previous(route('home'));
        if (parse_url($previous, PHP_URL_HOST) !== $request->getHost()) {
            $previous = route('home');
        }
        $back = strtok($previous, '#').'#cotizar';

        // Campo trampa: solo un bot lo llena. Se responde como éxito sin guardar nada.
        if ($request->filled('empresa_web')) {
            return redirect()->to($back)->with('success', true);
        }

        $validator = Validator::make($request->all(), [
            'Name' => 'required|string|max:255',
            'Phone' => ['required', 'string', 'max:20', 'regex:/^[0-9 +()\-]{7,20}$/'],
            // not_regex: mitiga el aviso de inyección CRLF en la regla email de Laravel < 12.60
            'Email' => ['required', 'email:rfc', 'not_regex:/[\r\n]/', 'max:255'],
            'Location' => 'required|string|max:255',
            'Crop' => 'required|string|max:255',
            'Surface' => 'required|string|max:255',
            'Comment' => 'nullable|string|max:2000',
        ], [
            'required' => 'Escribe tu :attribute.',
            'email' => 'Escribe un correo válido, por ejemplo nombre@dominio.com.',
            'Email.not_regex' => 'Escribe un correo válido, por ejemplo nombre@dominio.com.',
            'Phone.regex' => 'Escribe un teléfono de 7 a 20 dígitos; puedes usar espacios, guiones y +.',
            'max' => 'El campo :attribute admite como máximo :max caracteres.',
        ], [
            'Name' => 'nombre',
            'Phone' => 'teléfono',
            'Email' => 'correo',
            'Location' => 'ubicación',
            'Crop' => 'cultivo',
            'Surface' => 'superficie',
            'Comment' => 'comentario',
        ]);

        if ($validator->fails()) {
            return redirect()->to($back)->withErrors($validator)->withInput($request->except('empresa_web'));
        }

        $cotizacion = Cotizacion::create($validator->validated());

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

        return redirect()->to($back)->with('success', true);
    }
}
