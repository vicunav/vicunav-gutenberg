# Plan: página de Portafolio

Spec: [`spec.md`](spec.md)<br>
Issue padre: #65<br>
Estado: Approved

## Resumen técnico

La página usa dos patterns: introducción y grid de proyectos. Ambos comparten
una hoja estructural cargada para `core/group`. El template ensambla header,
patterns y footer sin contenido de entrada.

## Archivos afectados

| Ruta | Cambio | Motivo |
|---|---|---|
| `patterns/portafolio-intro.php` | Nuevo | Introducción editable y H1 |
| `patterns/portafolio-proyectos.php` | Nuevo | Cuatro tarjetas y métricas |
| `assets/css/portafolio.css` | Nuevo | Grid, superficie y responsive |
| `assets/images/portfolio/` | Nuevo | Recursos locales optimizados |
| `templates/page-portafolio.html` | Nuevo | Template canónico |
| `inc/assets.php` | Modificar | CSS y manifiesto de imágenes |
| `inc/editor.php` | Modificar | Ruta canónica del editor |
| `bin/validate-theme.php` | Modificar | Template requerido |

## Bloques, APIs y tokens

- Bloques: Group, Heading, Paragraph, Image, Grid y List.
- Tokens: paleta neutral, `heading-large`, `heading-small`, `body`,
  `body-large`, `eyebrow`, escala de spacing y sombra `card`.
- CSS local: grid 2×2, proporción de imagen, cards, divider y orden responsive.
- APIs: `wp_enqueue_block_style()`, `get_theme_file_uri()` y filtros existentes
  del editor.

## Flujo

1. Capturar baseline y completar brief.
2. Registrar assets y checksums.
3. Implementar introducción como calibración.
4. Implementar grid y comparar macrogeometría.
5. Ajustar composición móvil y detalle editorial.
6. Integrar template/editor.
7. Ejecutar QA integral y documentar regresión.

## Accesibilidad

El título editorial es H1; nombres de proyecto son H2 y “Google PageSpeed
results” es H3. Los círculos de métricas son decorativos mediante CSS.

## Rendimiento

El Portafolio no añade preload: todas las imágenes comienzan bajo la
introducción y usan lazy loading. El peso total local objetivo es inferior a
`350 KB`.

## Seguridad

Los destinos externos se escapan, abren con `noopener` y no dependen de markup
remoto.

## QA

| Criterio | Prueba | Evidencia |
|---|---|---|
| AC-01–05 | Comparación 1440×900 y 390×844 | `docs/qa/evidence/portfolio/` |
| AC-06–07 | Template y Site Editor | `qa.md` |
| AC-08 | 320, 390, 768 y 1440 | métricas de regresión |
| AC-09 | Composer, assets, a11y y Lighthouse | `qa.md` |

## Rollback

Revertir el template retira la ruta visual. Los patterns, CSS y assets quedan
sin consumidores y pueden revertirse por commit.

## ADR

No se requiere. Aplica la arquitectura existente.
