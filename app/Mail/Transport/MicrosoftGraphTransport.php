<?php

namespace App\Mail\Transport;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Symfony\Component\Mailer\Exception\TransportException;
use Symfony\Component\Mailer\SentMessage;
use Symfony\Component\Mailer\Transport\AbstractTransport;

/**
 * Envía correo con Microsoft Graph (/users/{sender}/sendMail) usando
 * credenciales de aplicación (client credentials). No requiere SMTP ni la
 * contraseña del buzón, así que funciona con los "valores predeterminados de
 * seguridad" de Microsoft 365 activados.
 */
class MicrosoftGraphTransport extends AbstractTransport
{
    public function __construct(
        protected string $tenantId,
        protected string $clientId,
        protected string $clientSecret,
        protected string $sender,
    ) {
        parent::__construct();
    }

    protected function doSend(SentMessage $message): void
    {
        $response = Http::withToken($this->accessToken())
            ->withBody(base64_encode($message->toString()), 'text/plain')
            ->timeout(20)
            ->post('https://graph.microsoft.com/v1.0/users/'.rawurlencode($this->sender).'/sendMail');

        if (! $response->successful()) {
            throw new TransportException(
                'Microsoft Graph sendMail falló ('.$response->status().'): '.$response->json('error.message', $response->body())
            );
        }
    }

    /** Obtiene (y cachea) el token de aplicación. */
    public function accessToken(): string
    {
        $key = 'msgraph_token_'.md5($this->tenantId.$this->clientId);

        if ($token = Cache::get($key)) {
            return $token;
        }

        $response = Http::asForm()->timeout(20)->post(
            'https://login.microsoftonline.com/'.rawurlencode($this->tenantId).'/oauth2/v2.0/token',
            [
                'client_id' => $this->clientId,
                'client_secret' => $this->clientSecret,
                'scope' => 'https://graph.microsoft.com/.default',
                'grant_type' => 'client_credentials',
            ]
        );

        if (! $response->successful() || ! $response->json('access_token')) {
            throw new TransportException(
                'No se pudo obtener el token de Microsoft ('.$response->status().'): '
                .$response->json('error_description', $response->body())
            );
        }

        $token = $response->json('access_token');
        Cache::put($key, $token, max(60, (int) $response->json('expires_in', 3600) - 300));

        return $token;
    }

    public function __toString(): string
    {
        return 'microsoft-graph';
    }
}
