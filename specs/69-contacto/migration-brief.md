# Brief de migración: Contacto

Issue padre: #69<br>
Spec: [`spec.md`](spec.md)<br>
Última actualización: 2026-07-28

## Identidad y estado

| Campo | Valor |
|---|---|
| Referencia de solo lectura | `https://vicunav.com/contacto/` |
| URL local | `https://vicunav-gutenberg.local/contacto/` |
| Template | `page-contacto.html` |
| Estado estable | Fuentes, fondo y reCAPTCHA v3 cargados |
| Usuario | Anónimo |
| Viewports | 390×844 y desktop; reflow 320/768 pendiente |

## Paquete de contexto

| Categoría | Rutas o contratos | Motivo |
|---|---|---|
| Requeridos | `specs/69-contacto/`, `theme.json` | Contrato y tokens |
| Dependencias | `parts/`, `inc/editor.php`, solución #72 | Composición y formulario |
| Checks | `composer qa`, `composer audit`, browser QA | Gates |
| Excluidos | Homepage, Servicios y Portafolio completos | No son consumidores directos |

## Reutilización

| Elemento | Ruta/token | Decisión |
|---|---|---|
| Header | `parts/header.html` | Reutilizar |
| Footer | `parts/footer.html` | Reutilizar |
| Paleta/fuentes/spacing | `theme.json` | Reutilizar |
| Fondo | `assets/images/testimonio-fondo.webp` | Reutilizar; mismo source y checksum |
| Formulario | pendiente #72 | No vive en el theme |

## Mapa

| Orden | Sección | Pattern | Desktop | Móvil | Issue |
|---:|---|---|---|---|---:|
| 1 | Introducción y formulario | `vicunav/contacto-formulario` | dos columnas | una columna | #71 |
| 2 | Qué pasa después | incluido en el pattern o pattern propio según #72 | card centrada | ancho útil | #71 |

## Medidas

Las medidas desktop corresponden a viewport 1280 px y client width 1265 px.
Header y footer compartidos se excluyen del alto de `main`.

| Control | Desktop | Móvil 390 |
|---|---:|---:|
| Alto de `main` | 1311 px | 1487 px |
| Superficie principal | 1265×1111 px | 375×1407 px |
| Título | 1169×48 px | 343×77 px |
| Formulario | 1087×570 px | 309×867 px |
| Grupo de control | 552 px, dos columnas | 325 px, una columna |
| Card “Qué pasa después” | 500×208 px | 359×167 px |
| Overflow horizontal | ninguno | ninguno |

## Tipografía y controles

| Rol | Desktop | Móvil |
|---|---|---|
| Eyebrow | Caveat 21 | Caveat 21 |
| Título | Bodoni Moda 48/48, 300 | Bodoni Moda 32/38,4, 300 |
| Intro | Red Hat Display 18/23,4, 500 | igual |
| Labels | Red Hat Display 16/16, 400 | igual |
| Inputs | Red Hat Display 16/22,4; borde 1 px; radio 4 px | igual |
| Submit | Red Hat Display 16/16, 500 | igual |
| “Qué pasa después” | Bodoni Moda 36/36, 300 | Bodoni Moda 24/24, 300 |

El submit usa `#444444` y texto blanco. La superficie interior corresponde a
`neutral-200`; el fondo fotográfico ya existe localmente.

## Responsive

- Los tres pares iniciales pasan de dos columnas a una.
- Las textareas y el submit permanecen a ancho completo.
- El título baja de 48 px a 32 px y ocupa dos líneas.
- Los labels largos pueden envolver; el control mantiene alineación y target.
- No cambia el orden de tabulación ni el copy.

## Comportamiento

- Elementor Pro usa POST/AJAX y reCAPTCHA v3.
- No se ejecutó un envío real.
- Los estados de error y éxito deben especificarse en #72 y probarse localmente.
- No se observaron animaciones propias del contenido.

## Ledger

| Sección | Contenido | Macro desktop | Móvil | Detalle | Editor | Estado |
|---|---|---|---|---|---|---|
| Introducción | Pass | Baseline | Baseline | Baseline | Pending | Blocked by #72 |
| Formulario | Pass | Baseline | Baseline | Baseline | Pending | Blocked by #72 |
| Qué pasa después | Pass | Baseline | Baseline | Baseline | Pending | Blocked by #72 |

## Evidencia

- Baseline: `docs/qa/evidence/contacto/baseline/`.
- Regresión: pendiente de #71.
