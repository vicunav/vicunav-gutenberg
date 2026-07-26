# Línea base — Fase 1.1

## Alcance

Esta evidencia fija el estado anterior a la consolidación del Design System y de la experiencia de edición. El objetivo es poder demostrar que la refactorización conserva el contenido, la composición y el comportamiento responsive aprobados en Fase 1.

- Commit base: `c6b93e6`
- WordPress local: `7.0.2`
- Theme activo: `vicunav`
- Fecha: 25 de julio de 2026
- Navegador de captura: Chrome
- Viewports solicitados: `1440 × 900` y `390 × 844`

Las capturas incluyen la barra administrativa del usuario autenticado. Por ello, las métricas registran `32 px` adicionales en escritorio y `46 px` en móvil; esa franja no pertenece al theme y debe excluirse de cualquier comparación visual.

## Inventario

| Superficie | Cantidad |
|---|---:|
| Patterns registrados | 10 |
| Template parts | 2 |
| Templates | 2 |
| Hojas CSS por bloque | 11 |
| JavaScript propio | 0 |
| Familias tipográficas | 4 |
| Tamaños tipográficos | 18 |
| Espaciados | 18 |
| Colores | 16 |
| Gradientes | 1 |

El HTML serializado contiene `128` atributos `style` de bloques. Son atributos editables generados por Gutenberg y consumen presets del theme; no se detectaron colores o familias tipográficas visuales duplicados fuera de `theme.json`.

## Uso de tokens

Los tamaños tipográficos sin consumo directo en patterns, parts o CSS eran `legal`, `h6`, `h4`, `h3`, `h2` y `display`. Se mantenían únicamente como escala genérica o no tenían consumidores. Además:

- `h1` y `section-title` representan prácticamente el mismo tamaño fluido.
- `process-title` difiere `1,04 px` de `h5`.
- `callout-body` queda dentro del intervalo de `section-body`.

Los espaciados `0` y `100` no tenían consumidores. `hero-gutter` difiere `2 px` de `65`, y `cta-panel` difiere `3 px` de `80`. Estos pares son candidatos seguros para consolidación.

## Estado del Editor del sitio

WordPress resolvía `front-page`, `index`, `header` y `footer` desde archivos del theme (`source: theme`, `has_theme_file: true`). No había copias de templates o template parts guardadas en base de datos.

El registro `wp_global_styles` activo solo contenía las claves internas `version` e `isGlobalStylesUserThemeJSON`: no había overrides de `settings`, `styles` ni templates personalizados. Esto confirma que la comparación parte del código versionado, no de cambios invisibles en la base de datos.

## Métricas de referencia

| Métrica | Escritorio | Móvil |
|---|---:|---:|
| Alto total del documento | 8.564 px | 12.901 px |
| Overflow horizontal | 0 px | 0 px |
| Alto del header | 78,59 px | 80,63 px |
| Alto del footer | 1.090,80 px | 2.504,00 px |
| Imágenes del theme cargadas | 20/20 | 20/20 |

Las métricas completas por sección viven en [`metrics.json`](metrics.json).

## Capturas

- [`home-desktop.jpg`](home-desktop.jpg)
- [`home-mobile.jpg`](home-mobile.jpg)

## Resultado

**Pass.** La línea base es reproducible y no contiene overrides del editor. Los cambios posteriores deben mantener el inventario de contenido, evitar overflow horizontal, conservar la carga de los 20 assets y justificar cualquier diferencia visual superior a la tolerancia definida en `docs/QA.md`.
