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
composer install
composer qa
composer audit
```

Estos comandos cubren PHP lint, WPCS, PHPCompatibility, JSON, inventario de archivos, headers y slugs de patterns, section styles, rutas locales, firmas de secretos y advisories de dependencias. Como comprobaciones rápidas durante una edición:

```bash
jq empty theme.json
git diff --check
php -l patterns/<archivo>.php
rg '#[0-9A-Fa-f]{3,8}|font-family' parts patterns templates
```

El último comando debe devolver vacío para valores hardcodeados en bloques; revisar falsos positivos explícitamente. Además:

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

1. capturar el estado estable de referencia y local con mismo viewport;
2. completar primero la macrogeometría desktop: superficie, alto, ancho, gutter,
   columnas, gaps, alineación e imágenes;
3. validar la composición móvil como layout propio: orden, ancho, crop,
   alineación, espaciado y estados;
4. ajustar después tipografía, wrapping, bordes, botones y detalle editorial;
5. registrar commit, navegador, viewport, fecha y medidas por sección;
6. corregir diferencias o justificar una limitación técnica real;
7. adjuntar before/after o diff visual al PR.

La Fase 1 no acepta una preferencia de diseño como justificación. El contenido debe ser exacto; la tolerancia visual solo cubre rasterización de fuente/navegador y limitaciones documentadas de bloques core.

Las alturas se usan como diagnóstico, no como sustituto de la comparación. En
una referencia estable, revisar una diferencia acumulada de `main` superior a
`0,5 %`, una sección que difiera más de `max(24 px, 2 %)` o ejes alineados con
más de `8 px` de desplazamiento. Excluir admin bar y medir por separado
header/footer compartidos. Consultar el protocolo completo en
[`MIGRATION_PLAYBOOK.md`](MIGRATION_PLAYBOOK.md).

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

## Tooling

Implementado:

- PHP lint, WPCS y PHPCompatibility mediante Composer;
- validación de estructura, JSON y firmas sensibles;
- GitHub Actions en PHP 8.0 y 8.2;
- Theme Check en el gate de release.

Playwright, axe-core, Lighthouse y la matriz independiente con `@wordpress/env` se introducen únicamente cuando exista un entorno reproducible que no convierta el CI en una prueba frágil de LocalWP.

Fuentes: [Testing de themes](https://developer.wordpress.org/themes/advanced-topics/testing/), [Theme review requirements](https://make.wordpress.org/themes/handbook/review/required/) y [`@wordpress/env`](https://developer.wordpress.org/block-editor/reference-guides/packages/packages-env/).
