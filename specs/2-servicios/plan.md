# Plan: página de Servicios

Spec: [`spec.md`](spec.md)
Epic: #50

## Estrategia

La implementación avanza en el orden visual de la página. Cada issue deja una unidad completa: pattern registrado, CSS asociado, assets declarados, render comprobado y commit propio. La plantilla y la ruta local se integran después de completar las secciones, para que el QA final mida el ensamblaje definitivo.

## Fases

| Orden | Issue | Entrega | Gate |
|---:|---:|---|---|
| 1 | #51 | Spec, baseline e inventario de assets | Copy y fuentes verificables |
| 2 | #52 | Hero | AC-02 |
| 3 | #53 | Paquete Esencial | AC-03 |
| 4 | #54 | Paquete Completo | AC-04 |
| 5 | #55 | Beneficios | AC-05 |
| 6 | #56 | Proceso | AC-06 |
| 7 | #57 | Mantenimiento | AC-07 |
| 8 | #58 | Opciones adicionales | AC-08 |
| 9 | #59 | FAQ | AC-09 |
| 10 | #60 | CTA, template y ruta local | AC-10 |
| 11 | #61 | QA integral y release local | AC-11, AC-12 |

## Decisiones de implementación

- Se reutilizan `theme.json`, `parts/header.html`, `parts/footer.html` y `assets/images/cta-final-vicunav.webp`.
- Los dos paquetes comparten una hoja estructural para evitar duplicación y conservan clases modificadoras para sus diferencias visuales.
- FAQ usa `core/details`; no se incorpora un acordeón JavaScript.
- Las ilustraciones SVG de mantenimiento de producción se rasterizan a WebP seguro porque contenían imágenes incrustadas de gran peso y no ofrecían ventaja vectorial real.
- Las imágenes bajo el pliegue se cargan de forma diferida. El hero de Servicios es el único candidato adicional a precarga.
- La página local se crea con contenido vacío y la plantilla por slug; el título existe en WordPress para administración, pero no se renderiza ni se antepone en el editor.

## Verificación por entrega

1. PHP lint y WordPress Coding Standards.
2. Parseo y registro del pattern.
3. Copy literal contra `content-inventory.md`.
4. Recursos locales con dimensiones y carga apropiadas.
5. Render local y comparación con producción.
6. `git diff --check` antes de cada commit.

## Riesgos y mitigaciones

| Riesgo | Mitigación |
|---|---|
| CSS de Elementor altera capturas durante animaciones | Baseline capturado tras estabilizar el viewport; las animaciones no se reproducen. |
| Duplicación de reglas entre paquetes | Hoja compartida y clases modificadoras. |
| Página excesivamente pesada | Conversión WebP, dimensiones correctas y lazy loading. |
| FAQ larga y difícil de editar | Un bloque Details por pregunta dentro de un pattern `contentOnly`. |
| Divergencia entre frontend y editor | Estilos asociados a bloques con `wp_enqueue_block_style()` y smoke del Site Editor. |
| Tokens excesivos | Reutilizar escala vigente y añadir únicamente semántica transversal comprobada. |

## Rollback

Cada sección se revierte mediante su commit. Antes del ensamblaje no afecta rutas públicas; después, se revierte primero `page-servicios.html` o el commit de la sección correspondiente. La creación de la página solo afecta LocalWP y puede despublicarse sin tocar producción.

## ADR

No se requiere. El plan aplica la arquitectura ya ratificada. Se abrirá un ADR si aparece la necesidad de JavaScript propio, bloque custom, dependencia o una excepción transversal al sistema de diseño.
