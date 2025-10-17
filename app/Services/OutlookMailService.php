<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OutlookMailService
{
    protected $tenantId;
    protected $clientId;
    protected $clientSecret;

    public function __construct()
    {
        $this->tenantId = env('OUTLOOK_TENANT_ID');
        $this->clientId = env('OUTLOOK_CLIENT_ID');
        $this->clientSecret = env('OUTLOOK_CLIENT_SECRET');
    }

    public function sendMail($to, $subject, $bodyHtml)
    {
        $token = $this->getAccessToken();

        $response = Http::withToken($token)->post("https://graph.microsoft.com/v1.0/users/" . env('OUTLOOK_SENDER_EMAIL') . "/sendMail",[
            'message' => [
                'subject' => $subject,
                'body' => [
                    'contentType' => 'HTML',
                    'content' => $bodyHtml,
                ],
                'toRecipients' => [
                    [
                        'emailAddress' => [
                            'address' => $to,
                        ],
                    ],
                ],
            ],
            'saveToSentItems' => true,
        ]);

        return $response->successful();
    }

    protected function getAccessToken()
{
    $url = "https://login.microsoftonline.com/{$this->tenantId}/oauth2/v2.0/token";

    $response = Http::asForm()->post($url, [
        'grant_type' => 'client_credentials',
        'client_id' => $this->clientId,
        'client_secret' => $this->clientSecret,
        'scope' => 'https://graph.microsoft.com/.default',
    ]);

    $data = $response->json();

    if (!isset($data['access_token'])) {
        \Log::error('Error al obtener el token de Outlook:', [
            'status' => $response->status(),
            'body' => $response->body(),
            'json' => $data,
        ]);

        throw new \Exception('No se pudo obtener el token de acceso. Revisa tus credenciales.');
    }

    return $data['access_token'];
}

}
