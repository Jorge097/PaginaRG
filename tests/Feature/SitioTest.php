<?php

namespace Tests\Feature;

use App\Models\Cotizacion;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Mail;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

/**
 * Humo del sitio público: páginas, cabeceras de seguridad y formulario de cotización.
 * Usa transacciones para no dejar registros en la base local.
 */
class SitioTest extends TestCase
{
    use DatabaseTransactions;

    private const DATOS = [
        'Name' => 'Productor de prueba',
        'Phone' => '871 000 0000',
        'Email' => 'prueba@ejemplo.com',
        'Location' => 'Torreón',
        'Crop' => 'Nogal',
        'Surface' => '10 ha',
        'Comment' => 'Me interesa cotizar Complete Mix.',
    ];

    public static function paginas(): array
    {
        return [
            'inicio' => ['/'],
            'productos' => ['/productos'],
            'hacemos' => ['/hacemos'],
            'somos' => ['/somos'],
        ];
    }

    #[DataProvider('paginas')]
    public function test_las_paginas_cargan_con_cabeceras_de_seguridad(string $url): void
    {
        $this->get($url)
            ->assertOk()
            ->assertSee('id="cotizar"', false)
            ->assertHeader('X-Content-Type-Options', 'nosniff')
            ->assertHeader('X-Frame-Options', 'SAMEORIGIN')
            ->assertHeader('Content-Security-Policy');
    }

    public function test_la_csp_no_permite_codigo_en_linea(): void
    {
        $csp = $this->get('/')->headers->get('Content-Security-Policy');

        $this->assertStringContainsString("script-src 'self'", $csp);
        $this->assertStringNotContainsString('unsafe-inline', $csp);
    }

    public function test_contactanos_redirige_al_formulario(): void
    {
        $this->get('/contactanos')->assertRedirect('/#cotizar')->assertStatus(301);
    }

    public function test_una_cotizacion_valida_se_guarda_y_envia_correo(): void
    {
        Mail::fake();

        $this->from('/productos')
            ->post('/cotizaciones', self::DATOS)
            ->assertRedirect(url('/productos').'#cotizar')
            ->assertSessionHas('success', true);

        $this->assertDatabaseHas('Cotizaciones', ['Email' => 'prueba@ejemplo.com', 'Crop' => 'Nogal']);
    }

    public function test_campos_obligatorios_devuelven_errores(): void
    {
        $this->from('/')
            ->post('/cotizaciones', [])
            ->assertRedirect(url('/').'#cotizar')
            ->assertSessionHasErrors(['Name', 'Phone', 'Email', 'Location', 'Crop', 'Surface']);
    }

    public function test_correo_con_salto_de_linea_se_rechaza(): void
    {
        $this->from('/')
            ->post('/cotizaciones', ['Email' => "a@b.com\r\nBcc: x@evil.example"] + self::DATOS)
            ->assertSessionHasErrors('Email');
    }

    public function test_el_campo_trampa_no_guarda_nada(): void
    {
        $antes = Cotizacion::count();

        $this->from('/')
            ->post('/cotizaciones', ['empresa_web' => 'spam.example'] + self::DATOS)
            ->assertSessionHas('success', true);

        $this->assertSame($antes, Cotizacion::count());
    }

    public function test_un_referer_externo_no_provoca_redireccion_abierta(): void
    {
        $this->withHeader('Referer', 'https://evil.example/phish')
            ->post('/cotizaciones', [])
            ->assertRedirect(route('home').'#cotizar');
    }
}
