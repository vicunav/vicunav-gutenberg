# QA de Home EN - #88

Fecha: 2026-08-06

Entorno: LocalWP `vicunav-gutenberg`, WordPress `7.0.2`, PHP `8.2.29` y
Polylang Free `3.8.6`.

## Resultado

- Ruta: `/en/home/` responde HTTP 200 con `html[lang="en-US"]`.
- Relación: Home ES `6` y Home EN `18`; el selector navega en ambos sentidos a
  la traducción equivalente y anuncia el idioma actual.
- Template: `page-home`, sin título administrativo y con diez patterns EN.
- Copy: coincide con `specs/88-home-en/content-inventory.md`; no quedan cadenas
  españolas dentro de `main`, salvo el nombre propio `Vicuña`.
- Navegación: header, footer y CTAs conservan las rutas inglesas aprobadas.
  Portafolio no aparece porque no tiene traducción en este lote.
- Assets: se reutilizan los locales de Home ES; cero recursos externos en
  `main`, cero imágenes sin geometría renderizada y cero JavaScript propio.
- Regresión ES: `/` conserva `lang="es-ES"`, un H1, copy, estructura y rutas.

## Responsive y accesibilidad

Se inspeccionaron 320×800, 390×844, 768×1024 y 1440×900 en navegador real.
Todos conservaron ancho de documento dentro del viewport, headings legibles,
imágenes visibles y ausencia de solapes. El menú móvil abre y cierra, expone
`Open menu` y `Close menu`, y contiene Services, Let's Talk y ambos idiomas.

Lighthouse Accessibility `13.4.1` obtuvo `100`, sin auditorías binarias
fallidas. La estructura tiene un H1, `main`, navegación con nombre, alt text,
skip link, foco visible definido por el theme y estado actual del selector.

## Editor del sitio

Se abrió con sesión administrativa el template
`vicunav//page-home` en WordPress. El lienzo mostró header, diez secciones y
footer con copy inglés editable. No aparecieron bloques inválidos, bloque Post
Title, cambios sin guardar ni errores de consola.

## Rendimiento

Herramienta: Lighthouse `13.4.1`, Chrome headless `151`, perfil móvil,
certificado local permitido, usuario anónimo y tres corridas frías por idioma.

| Ruta | Performance | FCP | LCP | CLS | TBT | Transferencia | Requests |
|---|---:|---:|---:|---:|---:|---:|---:|
| Home ES, mediana | 90 | 2.130 ms | 2.655 ms | 0,0762 | 186 ms | 617.100 B | 30 |
| Home EN, mediana | 90 | 2.102 ms | 2.627 ms | 0,0981 | 179 ms | 616.814 B | 30 |

Una corrida ES tuvo un TBT atípico de 2.193 ms; las otras dos fueron 186 y
182 ms. La mediana EN conserva el score, reduce levemente LCP y transferencia,
y mantiene CLS bajo el presupuesto de 0,1. No existe regresión significativa
respecto a la misma composición española en el mismo entorno.

## Gates

```text
wp eval-file bin/setup-polylang.php (dos ejecuciones idempotentes)
composer qa
composer audit
git diff --check
Lighthouse Performance ES/EN x3
Lighthouse Accessibility EN x1
```

Veredicto: Pass para #88.
