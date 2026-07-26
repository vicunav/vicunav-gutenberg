# Regresión final — Fase 1.1

## Alcance

Esta evidencia valida la consolidación del Design System, la experiencia de edición, la carga de assets y los quality gates. La comparación parte del commit `c6b93e6` y cubre el resultado acumulado de los issues `#42` a `#48`.

- Rama probada: `agent/41-design-system-editor-ux`
- WordPress local: `7.0.2`
- Theme activo: `vicunav`
- Fecha: 26 de julio de 2026
- Viewports de referencia: `390 × 844` y `1440 × 900`
- Motores: Chrome `150.0.7871.182`, Firefox `144.0.2` y WebKit `26.0`

Las capturas autenticadas incluyen la barra administrativa. La matriz multinavegador se ejecutó como usuario anónimo y usa el viewport exacto indicado.

## Resultado visual

El contenido, el orden de las diez secciones, las superficies, las veinte imágenes y los landmarks se conservaron. Las capturas finales cambian:

| Captura | Línea base | Final | Diferencia |
|---|---:|---:|---:|
| Escritorio | 8.564 px | 8.574 px | +10 px (`0,12 %`) |
| Móvil | 13.007 px | 13.015 px | +8 px (`0,06 %`) |

Las diferencias están dentro de la tolerancia de `0,5 %`:

- el padding interno del CTA pasó de `61 px` a `64 px` al reutilizar el preset `80`;
- el título de cada paso del proceso pasó de `22 px` a `23,04 px` al reutilizar `heading-small`;
- el H1 reutiliza `heading-large`, con una diferencia de rasterización inferior a `0,25 px`;
- el hero mantiene su alto mínimo, aunque su gutter reutiliza el preset `65`.

No cambió el copy, no se alteraron los saltos editoriales principales y no apareció overflow horizontal.

## Matriz de navegadores

Las nueve combinaciones respondieron `200`, declararon idioma español y conservaron `1` H1, `9` H2, `10` secciones, header, main y footer.

| Motor | Móvil | Tablet | Escritorio | Assets | Overflow | Violaciones axe |
|---|---:|---:|---:|---:|---:|---:|
| Chrome | 12.866 px | 12.656 px | 8.542 px | 20/20 | 0 px | 0 |
| Firefox | 12.864 px | 12.656 px | 8.542 px | 20/20 | 0 px | 0 |
| WebKit | 12.779 px | 12.601 px | 8.521 px | 20/20 | 0 px | 0 |

La diferencia de alto entre motores corresponde a su rasterización tipográfica. En móvil, el menú se abrió en los tres motores, expuso sus cuatro enlaces, cerró con `Escape` y devolvió el foco al botón de apertura. No hubo errores de consola ni de página.

axe dejó un resultado `incomplete` por viewport para revisión manual; no es una violación. La inspección manual confirmó landmarks, jerarquía de encabezados, nombres accesibles y foco del menú.

Los datos completos viven en [`browser-matrix.json`](browser-matrix.json).

## Editor del sitio

La plantilla `vicunav//front-page` cargó completa en el Editor del sitio:

- header, diez secciones —incluido el hero— y footer presentes;
- interfaz global de tipografía, colores, fondo, sombras, estructura y estilos por bloque disponible;
- estructura protegida y contenido editable;
- ningún mensaje de bloque inválido;
- ningún cambio pendiente en base de datos.

El resultado serializado vive en [`editor-regression.json`](editor-regression.json).

## Rendimiento

Se ejecutaron tres corridas Lighthouse móviles con cache fría. Las tres obtuvieron `91`.

| Métrica | Línea base | Mediana final | Cambio |
|---|---:|---:|---:|
| Performance | 84 | 91 | +7 |
| FCP | 2.252 ms | 2.280 ms | +28 ms |
| LCP | 3.376 ms | 2.730 ms | −646 ms |
| CLS | 0,0755 | 0,0192 | −0,0563 |
| TBT | 223 ms | 174 ms | −49 ms |
| Transferencia | 607.484 B | 575.589 B | −31.895 B |
| Requests | 23 | 22 | −1 |

La variación de FCP es menor al ruido normal de una medición local. LCP, CLS, TBT, transferencia y requests mejoraron. El reporte vive en [`lighthouse-summary.json`](lighthouse-summary.json).

## Capturas

- [`home-desktop.jpg`](home-desktop.jpg)
- [`home-mobile.jpg`](home-mobile.jpg)
- Línea base: [`../baseline/home-desktop.jpg`](../baseline/home-desktop.jpg) y [`../baseline/home-mobile.jpg`](../baseline/home-mobile.jpg)

## Gates

Antes del commit final se ejecutan:

```bash
composer qa
composer audit
git diff --check
```

Además, Theme Check no reportó requisitos ni advertencias, y la portada respondió correctamente desde LocalWP.

## Resultado

**Pass.** La fase 1.1 conserva la fidelidad visual aprobada, reduce la escala a diez tamaños tipográficos y catorce espaciados, mantiene la edición nativa de Gutenberg, mejora las métricas de rendimiento y queda cubierta por quality gates reproducibles.
