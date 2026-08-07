# QA integral multidioma ES/EN - #91

Fecha: 2026-08-06

Entorno: LocalWP `vicunav-gutenberg`, WordPress `7.0.2`, PHP `8.2.29`,
Polylang Free `3.8.6`, Contact Form 7 `6.1.6` y Chrome `151` sobre macOS.

## Resultado

La matriz integral aprueba Home, Servicios y Contacto en español e inglés.
Portafolio permanece solo en español por contrato y no ofrece un destino inglés.

| Superficie | Español | Inglés | Relación | Estado |
|---|---|---|---|---|
| Home | `/` | `/en/home/` | `6` ↔ `18` | Pass |
| Servicios | `/servicios/` | `/en/website-design-for-therapists-and-wellness-practices/` | `12` ↔ `20` | Pass |
| Contacto | `/contacto/` | `/en/contact/` | `16` ↔ `22` | Pass |
| Portafolio | `/portafolio/` | Fuera de alcance | Sin relación EN | Pass |

Cada ruta incluida respondió HTTP 200, declaró el `lang` esperado, publicó un
canonical exacto, mantuvo un H1 y un `main`, y marcó el idioma actual con
`aria-current`. El selector navegó bidireccionalmente a la traducción
equivalente. No se detectaron fugas de locale en header, footer ni CTA.

## Hallazgo corregido

WordPress priorizaba `front-page` también para la traducción inglesa de la
página estática configurada como portada. Por ello Home EN ensamblaba el
contenido inglés con header y footer españoles, aunque la página tuviera
asignado `page-home`.

El filtro acotado de `get_block_templates` sustituye ese candidato por
`page-home` solo en la página inglesa `home`. La revalidación confirmó
navegación, logo, contenido y footer ingleses, sin alterar la portada española.

## Responsive, interacción y accesibilidad

Las seis rutas se inspeccionaron a 320×800, 390×844, 768×1024 y 1440×900. Las
24 combinaciones conservaron un H1, un `main`, geometría válida de imágenes y
cero overflow horizontal. Home EN se volvió a revisar después de la corrección
de template, incluido su menú móvil y el perfil móvil final de Lighthouse.

- Site Editor: `front-page`, `page-home`, `page-servicios`, `page-services-en`,
  `page-contacto` y `page-contact-en` cargaron sin Post Title, bloques inválidos
  ni cambios pendientes.
- Teclado: el recorrido alcanzó la barra administrativa y el skip link en orden;
  cada elemento expuso `:focus-visible` y outline visible.
- Menú: desktop y overlay móvil conservaron destinos, nombres y locale.
- FAQ: las 17 preguntas de cada página de Servicios abren mediante `summary`;
  se probó interacción en ambos idiomas.
- Semántica: landmarks, headings, alt text, navegación nombrada, idioma y estado
  actual fueron coherentes. Lighthouse Accessibility obtuvo `100` en las 18
  corridas.
- Reflow: la matriz a 320 px cubre el equivalente práctico de zoom 200 % sin
  scroll horizontal. No hay animaciones propias que requieran una variante de
  movimiento reducido.

La revisión interactiva se ejecutó en Chrome y en el navegador integrado. No se
repitió la matriz completa en Firefox y Safari en esta ejecución; el riesgo se
considera bajo porque la interacción depende de bloques core y elementos HTML
nativos, y la matriz cross-browser de la fase anterior permanece aprobada.

## Formularios y privacidad

Contacto ES usa el formulario `15` (`es_ES`) y Contact EN el `25` (`en_US`).
Ambos tienen `do_not_store: true`. Los submits vacíos mostraron validación en el
idioma activo y los envíos válidos de datos ficticios recibieron éxito en ES/EN.

Mailpit pasó de dos a cuatro mensajes y recibió una entrega nueva por idioma,
con asunto, destinatario y `Reply-To` correctos. Los valores de Turnstile no se
leyeron ni imprimieron. Flamingo permanece inactivo; no existen tablas ni post
type de Flamingo y WordPress conserva únicamente los dos posts de configuración
CF7. Los assets de CF7 y Turnstile no se cargan fuera de Contacto.

## Rendimiento

Herramienta: Lighthouse `13.4.1`, Chrome headless `151`, perfil móvil,
certificado local permitido, usuario anónimo y tres corridas frías por ruta.

| Ruta | Performance | FCP | LCP | CLS | TBT | Transferencia | Requests |
|---|---:|---:|---:|---:|---:|---:|---:|
| Home ES | 91 | 2.102 ms | 2.627 ms | 0,0762 | 175 ms | 617.101 B | 30 |
| Home EN | 92 | 2.101 ms | 2.776 ms | 0,0981 | 4 ms | 616.850 B | 30 |
| Servicios ES | 90 | 2.101 ms | 3.105 ms | 0,0407 | 166 ms | 753.436 B | 32 |
| Servicios EN | 91 | 1.802 ms | 3.076 ms | 0,0022 | 170 ms | 753.157 B | 32 |
| Contacto ES | 94 | 2.101 ms | 2.626 ms | 0,0027 | 85 ms | 482.354 B | 31 |
| Contacto EN | 94 | 2.101 ms | 2.626 ms | 0,0035 | 83 ms | 478.885 B | 31 |

Todas las medianas de Performance cumplen el gate de desarrollo `≥ 90`, CLS
permanece bajo `0,1` y no hay regresión significativa entre locales. El objetivo
LCP `≤ 2,5 s` de `docs/PERFORMANCE.md` corresponde a datos de campo p75; estas
mediciones locales de laboratorio se registran como baseline y no lo sustituyen.

## Gates técnicos y seguridad

```text
composer qa: Pass
composer audit: Pass, sin advisories
git diff --check: Pass
Theme Check 20231220: PASS=yes, 0 resultados REQUIRED
Templates: parse_blocks y do_blocks producen salida en las seis composiciones
debug.log: ausente
Rollback Polylang: portada ES HTTP 200; plugin reactivado y Home EN HTTP 200
GitHub Actions PHP 8.0/8.2: Pass en PR #103
```

Theme Check mostró cinco advertencias no bloqueantes sobre `bin/` y capturas de
evidencia que quedan fuera del paquete distribuible. No reportó errores de
seguridad. La inspección del diff no encontró secretos, rutas efímeras, recursos
remotos, APIs deprecated ni persistencia nueva.

## Rollback

Revertir el squash de #91 elimina únicamente la selección especial de Home EN y
la documentación integral. El rollback completo del lote conserva las páginas y
relaciones: primero se retira el selector, luego se desactiva Polylang y se
comprueban las rutas españolas. No se borran datos sin autorización explícita.

## Veredicto

Pass para #91 y para los criterios técnicos del lote #86. Producción, Portafolio
EN y la validación sobre infraestructura de staging permanecen fuera de alcance.
