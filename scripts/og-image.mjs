// Genera la imagen para vistas previas al compartir el enlace (Open Graph):
// public/Img/og/rg-og.jpg, 1200x630, con el logotipo, el nombre y una frase.
// Uso: node scripts/og-image.mjs
import { mkdir, stat } from 'node:fs/promises';
import sharp from 'sharp';

const W = 1200;
const H = 630;
const OUT_DIR = 'public/Img/og';
const OUT = `${OUT_DIR}/rg-og.jpg`;

// Fondo: verde nogal casi negro con la luz dorada de la tarde (mismos tokens que el sitio).
const fondo = `
<svg xmlns="http://www.w3.org/2000/svg" width="${W}" height="${H}">
  <defs>
    <radialGradient id="luz" cx="88%" cy="8%" r="75%">
      <stop offset="0" stop-color="#e2b461" stop-opacity="0.34"/>
      <stop offset="0.6" stop-color="#e2b461" stop-opacity="0"/>
    </radialGradient>
  </defs>
  <rect width="${W}" height="${H}" fill="#0b1a12"/>
  <rect width="${W}" height="${H}" fill="url(#luz)"/>
  <circle cx="250" cy="315" r="168" fill="#fbfbf7"/>
  <rect x="0" y="${H - 14}" width="${W}" height="14" fill="#63bf69"/>
  <text x="470" y="270" font-family="Segoe UI, Arial, sans-serif" font-size="64" font-weight="600" fill="#ece9df" letter-spacing="-1.5">RG Fertilizantes</text>
  <text x="470" y="345" font-family="Segoe UI, Arial, sans-serif" font-size="64" font-weight="300" fill="#ece9df" letter-spacing="-1.5">Foliares</text>
  <text x="472" y="420" font-family="Segoe UI, Arial, sans-serif" font-size="30" fill="#a6b5a3">Fertilizantes foliares y para suelo,</text>
  <text x="472" y="462" font-family="Segoe UI, Arial, sans-serif" font-size="30" fill="#a6b5a3">laboratorio y asistencia técnica.</text>
  <text x="472" y="530" font-family="Segoe UI, Arial, sans-serif" font-size="26" font-weight="600" fill="#e2b461">Torreón, Coahuila</text>
</svg>`;

// Solo el árbol del logotipo (sin el texto inferior), dentro del círculo blanco.
const arbol = await sharp('public/Img/Logo2.png')
    .extract({ left: 90, top: 30, width: 830, height: 630 })
    .resize({ width: 250 })
    .png()
    .toBuffer();
const { height: hArbol } = await sharp(arbol).metadata();

await mkdir(OUT_DIR, { recursive: true });
await sharp(Buffer.from(fondo))
    .composite([{ input: arbol, left: 250 - 125, top: Math.round(315 - hArbol / 2) }])
    .jpeg({ quality: 86, mozjpeg: true })
    .toFile(OUT);

const { size } = await stat(OUT);
console.log(`${OUT} ${W}x${H} ${(size / 1024).toFixed(0)} KB`);
