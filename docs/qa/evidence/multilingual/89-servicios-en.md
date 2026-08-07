# QA de Servicios EN - #89

Fecha: 2026-08-06

Entorno: LocalWP `vicunav-gutenberg`, WordPress `7.0.2`, PHP `8.2.29` y
Polylang Free `3.8.6`.

## Resultado

- Ruta inglesa: HTTP 200 con `html[lang="en-US"]`; Servicios ES conserva
  HTTP 200 y `html[lang="es-ES"]`.
- Relación: Servicios ES `12` y Servicios EN `20`; el selector navega en ambos
  sentidos y anuncia el idioma actual.
- Template: `page-services-en`, sin título administrativo y con nueve patterns.
- Contenido: un H1, dos paquetes, ocho beneficios, cinco pasos, ocho prestaciones
  de mantenimiento, tres adicionales, 17 FAQ y CTA final.
- Rutas: los CTA EN usan `/en/contact/`; los CTA ES conservan `/contacto/`.
- Assets: se reutiliza el inventario local de Servicios; no hay hotlinks, tokens,
  CSS específico para inglés ni JavaScript propio.
- Idempotencia: dos ejecuciones consecutivas conservaron una sola página EN y
  la misma relación.

## Responsive e interacción

Se inspeccionaron 320×800, 390×844, 768×1024 y 1440×900 en navegador real. El
ancho del documento permaneció dentro del viewport, sin solapes ni imágenes de
contenido con geometría vacía. El menú móvil abre y cierra con nombres
accesibles; los FAQ abren mediante su `summary` nativo.

Lighthouse Accessibility `13.4.1` obtuvo `100`, sin auditorías binarias
fallidas. Se verificaron landmarks, jerarquía, alt text, navegación nombrada,
estado del idioma, foco visible y reflow.

## Editor del sitio

Se abrió con sesión administrativa `vicunav//page-services-en`. El lienzo mostró
header, nueve secciones y footer con copy inglés editable. No aparecieron Post
Title, bloques inválidos, cambios sin guardar ni errores visibles del editor.

## Rendimiento

Herramienta: Lighthouse `13.4.1`, Chrome headless `151`, perfil móvil,
certificado local permitido, usuario anónimo y tres corridas frías por idioma.

| Ruta | Performance | FCP | LCP | CLS | TBT | Transferencia | Requests |
|---|---:|---:|---:|---:|---:|---:|---:|
| Servicios ES, mediana | 90 | 2.101 ms | 3.199 ms | 0,0407 | 98 ms | 753.435 B | 32 |
| Servicios EN, mediana | 94 | 1.836 ms | 2.961 ms | 0 | 16 ms | 753.156 B | 32 |

La primera medición EN reveló CLS `0,125` por intercambio tardío de Bodoni en
el H1. La precarga del WOFF2 crítico local, junto con el preload del hero para
ambas plantillas de Servicios, redujo CLS a `0` en las tres corridas finales.
No se añadió ningún asset y el peso se mantuvo estable.

## Gates

```text
wp eval-file bin/setup-polylang.php (dos ejecuciones idempotentes)
composer qa
composer audit
git diff --check
Lighthouse Performance ES/EN x3
Lighthouse Accessibility EN x1
```

Veredicto: Pass para #89.
