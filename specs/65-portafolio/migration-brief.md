# Brief de migración: Portafolio

Issue padre: #65<br>
Spec: [`spec.md`](spec.md)<br>
Última actualización: 2026-07-28

## Identidad y estado

| Campo | Valor |
|---|---|
| Referencia | `https://vicunav.com/portafolio/` |
| URL local | `https://vicunav-gutenberg.local/portafolio/` |
| Template | `page-portafolio.html` |
| Estado estable | Fuentes e imágenes cargadas; cuatro `fadeIn` terminados |
| Usuario | Referencia anónima; local autenticado y anónimo |
| Viewports | 390×844 y 1440×900; reflow 320/768 |

## Reutilización

| Elemento | Ruta/token | Decisión |
|---|---|---|
| Header | `parts/header.html` | Reutilizar |
| Footer | `parts/footer.html` | Reutilizar |
| Paleta/fuentes/spacing | `theme.json` | Reutilizar |
| Sombra de cards | `--wp--custom--shadow--card` | Reutilizar |
| Textura | `portfolio/paper-texture.webp` | Asset actual de producción |

## Mapa

| Orden | Sección | Pattern | Fondo | Desktop | Móvil | Issue |
|---:|---|---|---|---|---|---:|
| 1 | Introducción | `vicunav/portafolio-intro` | neutral-300 + textura | centrada | centrada | #67 |
| 2 | Proyectos | `vicunav/portafolio-proyectos` | misma superficie | 2×2 | 1 columna | #67 |

## Medidas

| Control | Desktop | Móvil |
|---|---:|---:|
| `main` | 2365 px | 4110 px |
| Grid | 960 px | 325 px |
| Card | 464 px | 325 px |
| Gap desktop | 32 px | — |
| Imagen | 462×517 px | 325×364 px |
| Imagen 1 / top | 390 px | 445 px |
| Imagen 2 / top | 390 px | 1413 px |
| Imagen 3 / top | 1438 px | 2402 px |
| Imagen 4 / top | 1438 px | 3265 px |

El contenido principal tiene `64 px` de padding superior e inferior en
escritorio. La introducción ocupa `960 px`. Las cards usan `28 px` vertical y
`32 px` horizontal en su zona de contenido, `16 px` de gap y sombra neutral.

## Tipografía

| Rol | Referencia |
|---|---|
| Eyebrow | Red Hat Display 16/25,6, 500 |
| H1 | Bodoni Moda 48/48, 300 |
| Intro | Red Hat Display 18/28,8, 400 |
| Proyecto | Bodoni Moda 27,65/33,18, 500 |
| Descripción | Red Hat Display 15/24, 400 |
| Enlace | Red Hat Display 16/25,6, 500 |
| Heading métricas | Red Hat Display 16/25,6, 700 |
| Métricas | Red Hat Display 13,33/25,6, 500 |

## Responsive

- El grid se convierte en una columna.
- La introducción, el grid y las cards miden `327 px`; las imágenes interiores,
  `325×364 px`.
- Las imágenes usan un encuadre equivalente a `462/517`, que reproduce el
  redondeo observado de Elementor sobre los assets `916×1024`.
- No cambian el orden ni los estados.
- La composición móvil no muestra CTA adicional.
- Eleanor Wilde conserva la excepción publicada de `27,648 px` en el título y
  `24 px` de interlineado en la descripción; las otras tres cards usan `21 px`
  y `21 px`, respectivamente.

## Movimiento

Producción aplica `fadeIn` rápido a cada card. Se captura el estado final y se
omite la animación conforme a `AGENTS.md`.

## Ledger

| Sección | Contenido | Macro desktop | Móvil | Detalle | Editor | Estado |
|---|---|---|---|---|---|---|
| Introducción | Pass | Pass | Pass | Pass | Pending | Ready para #68 |
| Proyectos | Pass | Pass | Pass | Pass | Pending | Ready para #68 |

La regresión de #67 midió, excluyendo header/footer compartidos:

- desktop: grid `960 px`, cards `464 px`, imágenes `462×517 px` y `main`
  `2363 px` frente a `2365 px` en producción;
- móvil: grid/cards `327 px`, imágenes `325×364 px`, gaps `32 px` y `main`
  `4107 px` frente a `4110 px`;
- `scrollWidth === clientWidth` en ambos viewports.

## Evidencia

- Baseline: `docs/qa/evidence/portfolio/baseline/`.
- Regresión: `docs/qa/evidence/portfolio/regression/`.
