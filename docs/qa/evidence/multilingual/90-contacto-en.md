# QA de Contacto EN - #90

Fecha: 2026-08-06

Entorno: LocalWP `vicunav-gutenberg`, WordPress `7.0.2`, PHP `8.2.29`,
Contact Form 7 `6.1.6` y Polylang Free `3.8.6`.

## Resultado

- `/en/contact/`: HTTP 200 y `html[lang="en-US"]`; `/contacto/` conserva
  HTTP 200 y `html[lang="es-ES"]`.
- Relación: Contacto ES `16` y Contact EN `22`; selector correcto en ambos
  sentidos y template `page-contact-en`.
- Formularios: Contacto ES `15` (`es_ES`) y Contact EN `25` (`en_US`), un post
  por título después de dos ejecuciones consecutivas.
- Estructura EN: un H1, un formulario con nombre accesible, ocho campos, cuatro
  requeridos, una instancia de Turnstile y bloque posterior.
- Scope: assets de CF7 y Turnstile ausentes en Home EN.

## Flujo funcional y privacidad

El submit vacío produjo un estado accesible con el mensaje inglés general y
errores enlazados a nombre y correo. Un envío posterior con datos ficticios
obtuvo el mensaje de éxito inglés por AJAX.

Mailpit partió con cero mensajes y recibió el correo controlado con:

- asunto `New message from Vicunav - QA Contact EN 90`;
- remitente local del dominio de LocalWP;
- destinatario `hello@vicunav.com`;
- `Reply-To` igual al correo ficticio enviado.

Una revalidación final del formulario reprovisionado recibió un segundo correo
con el título actualizado. Un submit inmediato antes de que Turnstile terminara
de inicializar produjo el mensaje de spam aprobado; recargar, esperar la carga
del widget y reenviar completó el flujo correctamente.

La integración de Turnstile conserva un par de claves ya configurado, sin leer
ni imprimir sus valores. Ambos formularios exponen `do_not_store: true`;
Flamingo está inactivo, no existe su post type ni tablas asociadas y solo hay
dos posts CF7, correspondientes a los formularios ES y EN.

## Responsive y Editor del sitio

Los viewports 320×800, 390×844, 768×1024 y 1440×900 conservaron ancho de
documento dentro del viewport, ocho controles, un formulario y una instancia
de Turnstile. El grid pasa de una a dos columnas sin cambiar el orden lógico.

Se abrió `vicunav//page-contact-en` con sesión administrativa. El lienzo mostró
header, copy EN, bloque Shortcode, sección posterior y footer. No aparecieron
Post Title, bloques inválidos, cambios sin guardar ni errores visibles.

Lighthouse Accessibility `13.4.1` obtuvo `100`, sin auditorías binarias
fallidas.

## Rendimiento

Herramienta: Lighthouse `13.4.1`, Chrome headless `151`, perfil móvil,
certificado local permitido, usuario anónimo y tres corridas frías por idioma.

| Ruta | Performance | FCP | LCP | CLS | TBT | Transferencia | Requests |
|---|---:|---:|---:|---:|---:|---:|---:|
| Contacto ES, mediana | 94 | 2.101 ms | 2.626 ms | 0,0026 | 88 ms | 482.519 B | 31 |
| Contacto EN, mediana | 94 | 2.101 ms | 2.626 ms | 0,0035 | 84 ms | 480.299 B | 31 |

No existe regresión significativa entre idiomas. Las señales de Turnstile se
cargan únicamente en las páginas consumidoras.

## Gates

```text
wp eval-file bin/setup-polylang.php (dos ejecuciones idempotentes)
wp eval-file bin/setup-contacto.php (dos ejecuciones idempotentes)
composer qa
composer audit
git diff --check
Lighthouse Performance ES/EN x3
Lighthouse Accessibility EN x1
```

Veredicto: Pass para #90.
