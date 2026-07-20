# Estrategia de Quality Assurance

## Principio

QA es risk-based y produce evidencia. Todos los cambios pasan smoke tests; los cambios visibles añaden validación responsive, accesibilidad, comparación visual y rendimiento.

## Matriz soportada

Antes de release probar:

- WordPress mínimo declarado y última versión estable.
- PHP mínimo declarado y una versión moderna usada en producción.
- Chrome, Firefox y Safari actuales.
- Viewports de referencia: 390×844, 768×1024 y 1440×900.
- Usuario anónimo y usuario autenticado con admin bar.
- Editor del sitio y frontend.
- Preferencias `prefers-reduced-motion`, zoom 200% y modo de alto contraste cuando aplique.

## Gates por cambio

| Gate | Docs | Tokens | Pattern/template | PHP/JS | Release |
|---|---:|---:|---:|---:|---:|
| Markdown/enlaces | Sí | Sí | Sí | Sí | Sí |
| JSON y block markup | No | Sí | Sí | Sí | Sí |
| Render WordPress | No | Sí | Sí | Sí | Sí |
| Visual responsive | No | Según impacto | Sí | Según impacto | Sí |
| Accesibilidad | No | Contraste/tipo | Sí | Sí | Sí |
| Rendimiento | No | Fuentes/CSS | Sí | Sí | Sí |
| Seguridad | Según contenido | Assets | Links/markup | Sí | Sí |

## Controles estáticos actuales

Ejecutar desde la raíz:

```bash
jq empty theme.json
git diff --check
rg '#[0-9A-Fa-f]{3,8}|font-family' parts patterns templates
```

El último comando debe devolver vacío para valores hardcodeados en bloques; revisar falsos positivos explícitamente. Para cada pattern PHP:

```bash
php -l patterns/<archivo>.php
```

Además:

- confirmar headers `Title`, `Slug`, `Categories` y `Block Types`;
- confirmar slugs únicos `vicunav/*`;
- validar apertura/cierre de comentarios de bloque;
- validar que `theme.json` usa schema y versión soportada;
- buscar `TODO`, URLs remotas, debug y secretos antes del PR.

## Smoke test de WordPress

Con la versión PHP de LocalWP y el socket correcto:

1. `wp theme status vicunav` muestra `Active`.
2. `parse_blocks()` procesa parts, patterns y templates.
3. `do_blocks()` produce salida no vacía y sin fatal errors.
4. Homepage responde 200 y contiene cabecera, `main` y footer.
5. No hay warnings en `debug.log`, errores PHP ni errores de consola.

Si `wp-load.php` muestra un error de base de datos, diagnosticar el socket según `AGENTS.md`; no modificar código del theme para compensarlo.

## QA funcional

- Navegación y CTAs apuntan al destino esperado.
- Menú desktop y overlay móvil se abren, cierran y recorren con teclado.
- Logo enlaza al inicio.
- Copy y orden coinciden literalmente con el inventario.
- No existen bloques inválidos en Site Editor.
- Editor y frontend presentan la misma intención visual.
- No hay scroll horizontal entre 320 px y desktop.
- Estados hover, focus, active y visited no ocultan información.
- Links externos, email y políticas tienen semántica correcta.

## QA visual

Para cada sección:

1. capturar sitio de referencia y local con mismo viewport;
2. comparar estructura, ancho, espaciado, tipografía, color, imágenes y responsive;
3. registrar commit, navegador, viewport y fecha;
4. corregir diferencias o justificar una limitación técnica real;
5. adjuntar before/after o diff visual al PR.

La Fase 1 no acepta una preferencia de diseño como justificación. El contenido debe ser exacto; la tolerancia visual solo cubre rasterización de fuente/navegador y limitaciones documentadas de bloques core.

## Accesibilidad

Aplicar `docs/ACCESSIBILITY.md` y registrar:

- recorrido completo solo con teclado;
- foco visible y no oculto;
- jerarquía de headings y landmarks;
- nombres accesibles de controles;
- contraste;
- alt text;
- zoom/reflow;
- scan automatizado sin violaciones críticas o serias;
- revisión manual, porque el scanner no demuestra conformidad.

## Rendimiento

Aplicar `docs/PERFORMANCE.md`. Comparar contra baseline con cache fría y caliente. Registrar Lighthouse móvil, peso transferido, requests, LCP, CLS y TBT; INP se valida con datos de campo o interacción controlada, no se infiere solo de Lighthouse.

## Seguridad

- ningún secreto o dato local en el diff;
- assets con procedencia/licencia;
- sin recursos remotos inesperados;
- URLs y markup no abren XSS o reverse tabnabbing;
- si hay PHP: validación, sanitización, escaping, capability y nonce según contexto;
- sin APIs deprecated;
- Theme Check sin errores de seguridad antes de release;
- headers verificados en staging, no solo local.

## Evidencia mínima en PR

```text
Commit probado:
Entorno:
Checks ejecutados:
Resultado:
Viewports/navegadores:
Capturas o reportes:
Limitaciones/riesgo residual:
```

Usar `docs/templates/QA_EVIDENCE.md` para una validación extensa.

## Tooling objetivo

Roadmap recomendado, cada punto como issue propio:

- PHPCS con WordPress Coding Standards si aparece PHP.
- validación de Markdown y links.
- Playwright para smoke, navegación y screenshots.
- axe-core para asistencia automática de a11y.
- Lighthouse CI con presupuestos.
- Theme Check y Theme Unit Test Data.
- `@wordpress/env` para matriz reproducible independiente de LocalWP.

Fuentes: [Testing de themes](https://developer.wordpress.org/themes/advanced-topics/testing/), [Theme review requirements](https://make.wordpress.org/themes/handbook/review/required/) y [`@wordpress/env`](https://developer.wordpress.org/block-editor/reference-guides/packages/packages-env/).
