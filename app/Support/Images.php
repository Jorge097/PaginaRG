<?php

namespace App\Support;

use InvalidArgumentException;

/**
 * Lee resources/data/images.json (generado por scripts/optimize-images.mjs)
 * para emitir <img> con srcset y dimensiones reales (aspect-ratio reservado, CLS 0).
 */
final class Images
{
    private static ?array $manifest = null;

    /** @return array{width:int,height:int,src:string,srcset:string} */
    public static function get(string $name): array
    {
        self::$manifest ??= json_decode(
            (string) file_get_contents(resource_path('data/images.json')),
            true,
            flags: JSON_THROW_ON_ERROR
        );

        $img = self::$manifest[$name] ?? throw new InvalidArgumentException("Imagen desconocida: {$name}");
        $variants = $img['variants'];
        $largest = end($variants);

        return [
            'width' => (int) $img['width'],
            'height' => (int) $img['height'],
            'src' => asset($largest['src']),
            'srcset' => implode(', ', array_map(
                fn (array $v) => asset($v['src']).' '.$v['w'].'w',
                $variants
            )),
        ];
    }
}
