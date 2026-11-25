// Genera variantes WebP responsivas de public/Img/* en public/Img/opt/
// y un manifiesto con dimensiones reales (para reservar aspect-ratio: CLS 0).
// Uso: node scripts/optimize-images.mjs
import { readdir, mkdir, writeFile } from 'node:fs/promises';
import { join, parse } from 'node:path';
import sharp from 'sharp';

const SRC = 'public/Img';
const OUT = 'public/Img/opt';
const MANIFEST = 'resources/data/images.json';
const WIDTHS = [480, 960, 1600];

const slug = (s) => s.normalize('NFD').replace(/[̀-ͯ]/g, '').toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, '');

await mkdir(OUT, { recursive: true });
await mkdir('resources/data', { recursive: true });

const manifest = {};
for (const file of (await readdir(SRC)).sort()) {
    if (!/\.(jpe?g|png)$/i.test(file)) continue;
    const name = slug(parse(file).name);
    const img = sharp(join(SRC, file)).rotate();
    const { width, height } = await img.metadata();
    const variants = [];
    for (const w of WIDTHS.filter((w) => w < width).concat(width).filter((v, i, a) => a.indexOf(v) === i)) {
        if (w > 1600) continue;
        const out = `${name}-${w}.webp`;
        await sharp(join(SRC, file)).rotate().resize({ width: w }).webp({ quality: 74, effort: 5 }).toFile(join(OUT, out));
        variants.push({ w, src: `Img/opt/${out}` });
    }
    if (!variants.length) {
        const out = `${name}-1600.webp`;
        await sharp(join(SRC, file)).rotate().resize({ width: 1600 }).webp({ quality: 74, effort: 5 }).toFile(join(OUT, out));
        variants.push({ w: 1600, src: `Img/opt/${out}` });
    }
    manifest[name] = { width, height, variants };
    console.log(`${file.padEnd(28)} ${width}x${height} -> ${variants.map((v) => v.w).join(', ')}`);
}
await writeFile(MANIFEST, JSON.stringify(manifest, null, 2));
console.log(`\nManifiesto: ${MANIFEST}`);
