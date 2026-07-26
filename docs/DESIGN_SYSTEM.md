# Design System

## Fuente de verdad

`theme.json` es la única fuente de verdad para colores, familias tipográficas, tamaños de texto y espaciados editables. Los patterns y template parts consumen presets mediante `var:preset|…`; el CSS estructural solo puede consumir las variables CSS generadas por WordPress o los pocos tokens `settings.custom` aprobados.

Un valor nuevo entra al sistema únicamente cuando:

1. representa una diferencia perceptible y recurrente;
2. tiene al menos dos consumidores previsibles, o una responsabilidad global clara;
3. no puede expresarse con un preset existente dentro de la tolerancia visual;
4. su nombre describe un rol reutilizable, no una sección accidental.

Los valores estructurales locales de `0`, `1px`, ratios de columnas y breakpoints no son design tokens salvo que se repitan como una decisión visual.

## Escala tipográfica

La escala consolidada tiene diez tamaños:

| Slug | Rol |
|---|---|
| `eyebrow` | Etiquetas y texto auxiliar |
| `body` | Cuerpo y UI |
| `lead` | Introducciones fluidas |
| `body-large` | Cuerpo grande y footer |
| `body-callout` | Párrafos destacados |
| `body-responsive` | Cuerpo editorial fluido |
| `accent-text` | Acentos manuscritos |
| `heading-small` | Títulos compactos |
| `heading-medium` | Títulos intermedios y numeración |
| `heading-large` | H1 y títulos de sección |

`h1` y `h2` comparten `heading-large`; la jerarquía semántica sigue dependiendo del nivel HTML, no de crear tamaños casi idénticos. Del mismo modo, `h3`–`h6` reutilizan los escalones existentes.

## Escala de espaciado

La escala contiene catorce presets: diez pasos base, tres ritmos de sección y una dimensión de layout.

- Base: `10`, `20`, `30`, `40`, `45`, `50`, `60`, `65`, `70`, `80`.
- Sección: `section-editorial`, `90`, `cta-section`.
- Layout: `site-gutter`.

El cero se escribe como `0`, porque no representa una elección de ritmo. `hero-gutter` se consolidó en `65` —diferencia de `2 px`— y `cta-panel` en `80` —diferencia de `3 px`—. Los ritmos de `80 px`, `96 px` y `120 px` permanecen separados porque intercambiarlos sí altera la composición.

## Colores y superficies

Los colores conservan el inventario aprobado de Fase 1. No se agregan variaciones por componente; las superficies reutilizables se expresan como estilos de sección y consumen la paleta existente.

## Tolerancia de consolidación

Una consolidación puede aproximar un valor cuando:

- la diferencia tipográfica es menor o igual a `1,1 px`;
- la diferencia de espaciado es menor o igual a `4 px`;
- no cambia el número de líneas de un bloque editorial importante;
- el alto total de la portada cambia menos de `0,5 %`;
- no aparece overflow horizontal.

Si un texto cambia de línea o una sección supera esa tolerancia, se conserva un token distinto. Esta regla mantuvo `body-callout` como tamaño propio.

## Checklist para nuevos componentes

- Usar primero un pattern y bloques core.
- Elegir presets existentes antes de añadir valores.
- Mantener contenido y estructura editables desde el Editor del sitio.
- Aplicar el estilo de superficie aprobado a la raíz de la sección.
- Bloquear estructura, no contenido.
- Validar editor y frontend en móvil y escritorio.
- Registrar cualquier token nuevo y su justificación en este documento.
