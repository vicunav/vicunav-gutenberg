# QA: clon exacto del homepage en Gutenberg

Issue padre: #1<br>
Estado: QA visual #12, responsive #13, accesibilidad #14 y rendimiento #15 completadas; release candidate #16 en revisión<br>
Responsable: @mariovicunadev<br>
Última actualización: 2026-07-25

## Propósito

Este archivo consolida la evidencia de Fase 1. Cada PR registra sus pruebas inmediatas; #12–#16 completan la matriz integral sobre el commit candidato. Un estado `Pendiente` no equivale a aprobado.

## Entorno baseline

| Campo | Valor |
|---|---|
| URL local | `https://vicunav-gutenberg.local/` |
| Referencia de solo lectura | `https://vicunav.com/` |
| WordPress local comprobado | 7.0.2 |
| PHP local comprobado | 8.2 |
| WordPress mínimo declarado | 6.7 |
| PHP mínimo declarado | 8.0 |
| Theme | `vicunav`, activo mediante symlink al repositorio |
| Navegadores objetivo | Chrome, Firefox y Safari estables disponibles |
| Viewports de referencia | 390×844, 768×1024 y 1440×900 |
| Commit candidato | Se registra en #16 después de integrar los sub-issues |

Los comandos PHP que carguen WordPress deben usar el runtime de LocalWP y el socket MySQL correcto según `AGENTS.md`. Un mensaje HTML de error de base de datos se registra como `Fail` aunque el proceso devuelva exit code 0.

## Evidencia del paquete SDD (#2)

| Check | Procedimiento | Resultado esperado | Estado |
|---|---|---|---|
| Estructura | Verificar `spec.md`, `plan.md`, `tasks.md`, `qa.md` | Cuatro archivos presentes | Pendiente de PR |
| Marcadores | Buscar `TBD`, `TODO`, placeholders de plantilla y preguntas materiales | Sin marcadores no resueltos | Pendiente de PR |
| Trazabilidad | Comparar AC-01–AC-16 con #3–#16 | Cobertura completa y sin issue huérfano | Pendiente de PR |
| Consistencia | Constitución ↔ spec ↔ plan ↔ tasks ↔ QA | Sin contradicciones | Pendiente de revisión |
| Markdown | `git diff --check` e inspección de enlaces/rutas | Sin errores de whitespace o rutas inexistentes | Pendiente de PR |

## Matriz de criterios

| Criterio | Owner | Prueba principal | Evidencia requerida | Estado |
|---|---:|---|---|---|
| AC-01 | #12/#19/#21 | Render + comparación header/footer | Capturas y smoke | Pass local; header y footer integrados en `main` |
| AC-02 | #3 | Pattern hero | Lint, render, copy, asset y comparación visual | Pass local; integrado en `main` |
| AC-03 | #4 | Pattern situaciones | Lint, lista/checks y captura | Pass; PR #25 integrado en `main` |
| AC-04 | #5 | Patterns introducción + proceso | Lint, render, copy y captura | Pass; PR #32 integrado en `main` |
| AC-05 | #6 | Pattern testimonio | Lint, cita y captura | Pass con limitación documentada; PR #27 integrado |
| AC-06 | #7 | Pattern resultados | Lint, render, copy y captura | Pass; PR #28 integrado |
| AC-07 | #8 | Pattern debería sentirse | Lint, CTA y captura | Pass; PR #29 integrado |
| AC-08 | #9 | Pattern conoce a Mario | Lint, bio, alt/assets y captura | Pass; PR #30 integrado |
| AC-09 | #33/#10 | Marcas + CTA final | Lint, assets, teclado, destinos y captura | Pass; PRs #34 y #31 integrados |
| AC-10 | #3/#11 | Template incremental y cierre del ensamblaje | Parse, render, HTTP 200, orden y Site Editor | Pass; PR #35 integrado en `main` |
| AC-11 | #12 | Comparación sección por sección | Capturas/diff con commit y viewport | Pass; evidencia reproducible en `docs/qa/evidence/phase-1/` |
| AC-12 | #13 | Responsive + navegadores | Matriz y defectos resueltos | Pass; 21 recorridos en Chrome, Firefox y WebKit |
| AC-13 | #14 | WCAG 2.2 AA | Scanner + revisión manual | Pass; cero violaciones abiertas sobre `c23602f` |
| AC-14 | #15 | Assets + rendimiento | Peso, fuentes y Lighthouse ×3 | Pass; evidencia reproducible en `docs/qa/evidence/phase-1/performance/` |
| AC-15 | #16 | Gate final | Theme Check, seguridad y release docs | Pass sobre `356e341`; evidencia en `docs/qa/evidence/phase-1/release-candidate/` |
| AC-16 | #1 | Consistency check y cierre | Todos los sub-issues/evidencia | Pendiente del merge de #16 y smoke del SHA resultante en `main` |

## Hallazgo de baseline #19 — Header

Fecha: 2026-07-20<br>
Origen: revisión visual de `https://vicunav-gutenberg.local/` contra `https://vicunav.com/`

| Control | Local observado | Referencia | Estado inicial |
|---|---|---|---|
| Header desktop | ≈84,7 px | 80 px | Fail |
| Logo desktop | 180×37 px | ≈145×30 px | Fail |
| Navegación | Mayúsculas; sin bandera ni subrayado de idioma | Title case; bandera y subrayado | Fail |
| Header móvil | Logo de 180 px; icono de menú sin etiqueta | Logo ≈160×33 px; “MENU” visible | Fail |

### Resultado de la corrección

Entorno: WordPress 7.0.2, PHP 8.2.29, Chrome y theme activo mediante symlink temporal al worktree de #19.

| Viewport/control | Resultado corregido | Veredicto |
|---|---|---|
| 1440×900 autenticado | Header 79 px; logo 145×30 px; margen lateral 72 px; title case; bandera 21×15 px; sin overflow | Pass |
| 390×844 autenticado | Header 81 px; logo 160×33 px; margen lateral 20 px; botón “MENU” 71×24 px; sin links desktop visibles ni overflow | Pass |
| Menú overlay | Abre con los cuatro destinos; `Escape` cierra y devuelve foco a “Open menu” | Pass |
| Frontend/editor | Hoja registrada mediante `wp_enqueue_block_style()`; WordPress la sirve inline con `sourceURL` portable | Pass funcional |

La diferencia de un píxel en la altura depende del redondeo subpíxel de la relación intrínseca del logo y está dentro de la tolerancia de rasterización. La comparación integral anónima y entre navegadores permanece en #12/#13.

## Ejecución #3 — Hero

Fecha: 2026-07-20<br>
Rama: `agent/3-pattern-hero`<br>
Commit probado: se registra en el PR del issue #3<br>
Entorno: WordPress 7.0.2, PHP 8.2.29 y theme `vicunav` activo en LocalWP

### Resultados

| Check | Resultado | Evidencia |
|---|---|---|
| PHP | Pass | `php -l patterns/hero.php` sin errores. |
| Registro | Pass | `WP_Block_Patterns_Registry` devuelve `vicunav/hero`. |
| Render | Pass | `parse_blocks()` + `do_blocks()` producen salida no vacía, un `h1` y asset local. |
| Copy | Pass | Eyebrow, H1, descripción y CTA coinciden literalmente con el spec. |
| Asset | Pass con seguimiento | WebP local 1536×1024, 45.092 bytes y checksum registrado en `assets/images/SOURCES.md`; licencia original se reverifica en #16. |
| Site Editor | Pass | Hero aparece en “All patterns”, “Banners” y “Featured”; el preview contiene un `h1`. |
| Frontend | Pass | `front-page.html` incremental elimina el wrapper constrained; `/` responde HTTP 200 y contiene `.vicunav-hero` a ancho completo. |
| Consola | Pass | Sin errores ni warnings durante la matriz responsive. |

### Comparación visual

| Viewport | Referencia | Local | Resultado |
|---|---|---|---|
| 390×844 | Hero ≈570,6 px; H1 32/38,4 px; cuerpo 14/19,6 px; CTA 48 px | Hero ≈570,9 px; H1 32,2/38,5 px; cuerpo 14,1/19,8 px; CTA 48 px | Pass |
| 768×1024 | Composición responsive intermedia | Hero ≈579,1 px; sin overflow; H1 37,8 px; cuerpo 15,9 px | Pass funcional |
| 1440×900 | Hero ≈592,7 px; H1 48/48 px; cuerpo 19/30,4 px; CTA 48 px | Hero ≈593 px; H1 47,8/48 px; cuerpo 19,2/30,4 px; CTA 48 px | Pass |
| Overlay de lectura | Gradiente radial `neutral-100` → `neutral-100` al 10 % | Preset `hero-readability` de `theme.json` con la misma composición | Pass |

Se compararon encuadre, posición vertical, saltos de línea, familias, peso, color y dimensiones del CTA. El asset local es la misma imagen optimizada servida por la referencia, sin hotlink. La cabecera y el footer pertenecen a su baseline previa y no alteran el veredicto del pattern.

La inspección computada de producción confirmó dos capas superpuestas: un gradiente radial desde `neutral-100` hasta transparente y una capa `neutral-100` al 10 %. El preset local combina ambas en un solo gradiente equivalente; el pattern consume ese preset y solo tres variables semánticas para altura e interlineado/tracking. Los demás tamaños y espacios reutilizan la escala global.

### Ensamblaje incremental en `/`

La comparación final usa el mismo viewport y elimina del cálculo la barra de administración local. `front-page.html` contiene únicamente header → Hero → footer en esta etapa; el footer inmediato es inventario pendiente, no una representación de que el homepage esté completo.

| Control | Referencia | Local | Resultado |
|---|---|---|---|
| 1440×900 | Header 80 px; Hero 593 px; imagen x=0/ancho=1425; contenido x=313/ancho=800 | Header 79 px; Hero 593 px; imagen x=0/ancho=1425; contenido x=313/ancho=800 | Pass |
| Posición desktop | Eyebrow y=157; título y=207; cuerpo y=343; CTA y≈501 | Eyebrow y=155; título y=202; cuerpo y=338; CTA y=499 | Pass, diferencia ≤6 px |
| 390×844 | Header 80 px; Hero 571 px; contenido x=42/ancho=291; CTA 168×48 px | Header 81 px; Hero 571 px; contenido x=42/ancho=291; CTA 168×48 px | Pass, diferencia ≤4 px |
| 768×1024 | Composición intermedia | Hero 579 px; un `h1`; sin overflow | Pass funcional |
| Flujo vertical | Header y Hero adyacentes | Gap 0; Hero y footer adyacentes mientras faltan secciones | Pass estructural |
| Consola | Sin errores atribuibles a la sección | 0 errores/warnings | Pass |

### Veredicto del issue

**Pass local sobre la portada incremental; pendiente de review del PR.** No se avanzó al pattern de situaciones.

## Ejecución #4 — Situaciones

Fecha: 2026-07-25<br>
Rama: `agent/4-pattern-situaciones`<br>
Entorno: WordPress 7.0.2, PHP 8.2.29 y navegador Chromium

### Resultados

| Check | Resultado | Evidencia |
|---|---|---|
| PHP y JSON | Pass | `php -l` para pattern/functions, `jq empty theme.json` y `git diff --check`. |
| Registro y render | Pass | `vicunav/situaciones` registrado; `parse_blocks()` y `do_blocks()` producen un H2, ocho elementos de lista y el asset local. |
| Copy | Pass | Título y ocho situaciones coinciden literalmente con `AGENTS.md`. |
| Semántica | Pass | Un único bloque `core/list`; los checks son decorativos y no duplican contenido para tecnologías de asistencia. |
| Assets | Pass con seguimiento | WebP local 1536×1024, 32.062 bytes y SHA-256 documentado; sin hotlink. |
| Frontend | Pass | `/` responde HTTP 200, mantiene un solo H1 y no presenta overflow horizontal. |

### Comparación visual

| Control a 1280×720 | Referencia | Local | Veredicto |
|---|---:|---:|---|
| Sección | 1265×709,6 px | 1265×717,6 px | Pass; diferencia vertical ≈8 px |
| H2 | 1265×48 px; Bodoni 48/48, peso 300 | 1137×45,6 px; Bodoni 48/48, peso 300 | Pass; el ancho local respeta el margen global |
| Tarjeta | 1080×489,6 px; padding 32 px | 1080×496 px; padding 32 px | Pass; diferencia ≈6,4 px por rasterización tipográfica |
| Lista | 1016×425,6 px; texto 18/25,2 | 1016×432 px; texto 18/25,2 | Pass |
| Fondo | Asset original + `neutral-100` al 60 % | Mismo asset local + preset `neutral-100` al 60 % | Pass |

En 390×844 la tarjeta ocupa 335 px con margen de sitio de 20 px, los ocho puntos conservan el orden y no existe overflow. Los valores reutilizables se limitan a un ancho de contenido y una sombra semántica en `theme.json`; color, tipografía y espaciado consumen presets globales.

### Veredicto del issue

**Pass local; pendiente de review del PR.**

## Ejecución #5 — Cómo ayudamos

Fecha: 2026-07-25<br>
Rama: `agent/5-pattern-como-ayudamos`<br>
Base de revisión: `main`, después del squash merge del issue #4

### Resultados

| Check | Resultado | Evidencia |
|---|---|---|
| PHP y JSON | Pass | `php -l`, `jq empty theme.json` y `git diff --check` sin errores. |
| Registro y render | Pass | `vicunav/como-ayudamos-intro` y `vicunav/como-ayudamos` registrados; dos H2, seis títulos de paso, siete imágenes y CTA. |
| Copy | Pass | Introducción, cuatro puntos, proceso 01–06 y “Ver paquetes” coinciden con la referencia vigente. |
| Bloques | Pass | Composición exclusiva con Group, Paragraph, Heading, Image, Buttons y Button. |
| Assets | Pass con seguimiento | Siete WebP locales, 251.310 bytes combinados, fuentes y checksums documentados. |
| Frontend | Pass | HTTP 200, un H1 en la página, imágenes cargadas y cero overflow horizontal. |

### Comparación visual

La auditoría del 2026-07-25 confirmó que la referencia contiene dos secciones completas. Se implementan como patterns independientes para conservar responsabilidad única y edición directa desde Gutenberg.

| Control a 1792 px | Referencia | Local | Veredicto |
|---|---:|---:|---|
| Introducción | 1792×723,42 px | 1792×723,39 px | Pass |
| Copy de introducción | 669,60×635,42 px | 669,88×635,39 px | Pass |
| Imagen editorial | 501,96×627,45 px | 506,11×632,63 px | Pass; diferencia ≤5,2 px |
| Proceso | 1792×894,17 px | 1792×894,17 px | Pass |
| Cuadrícula | 1280 px; dos columnas de 624 px | 1280 px; dos columnas de 624 px | Pass |
| Medio de cada paso | 145,93×111,63 px | 145,92×111,63 px | Pass |
| CTA | 155,85×48 px | 155,85×48 px | Pass |

En 390×844 ambas secciones colapsan a una columna de 350 px, conservan el orden editorial, todas las imágenes cargan y no existe overflow horizontal. `AGENTS.md` y el spec se actualizaron con el contenido real detectado, evitando que la documentación vuelva a ocultar estas diferencias.

### Veredicto del issue

**Pass local; pendiente de review del PR.**

## Ejecución #6 — Testimonio destacado

Fecha: 2026-07-25<br>
Rama: `agent/6-pattern-testimonio`<br>
Base de revisión: PR del issue #5

### Resultados

| Check | Resultado | Evidencia |
|---|---|---|
| PHP y JSON | Pass | Lint de pattern/functions, JSON válido y diff sin whitespace inválido. |
| Registro y render | Pass | `vicunav/testimonio-destacado` produce un `blockquote`, tres imágenes y atribución. |
| Copy | Pass | Eyebrow, cita y atribución con guion coinciden literalmente con la referencia vigente. |
| Semántica | Pass | La cita usa `core/quote`; retrato con alt de identidad y fondo decorativo con alt vacío. |
| Assets | Pass con limitación trazada | Fondo, poster y retrato locales: 99.132 bytes combinados. |
| Frontend | Pass | HTTP 200, medios cargados y sin overflow horizontal. |

### Comparación visual a 1280×720

| Control | Referencia | Local | Veredicto |
|---|---:|---:|---|
| Sección | 1792×1377,71 px | 1792×1377,70 px | Pass |
| Tarjeta | 500×968,7 px | 500×968,7 px | Pass |
| Medio principal | 436×775,1 px | 436×775,1 px | Pass |
| Retrato | 120×120 px | 120×120 px | Pass |
| Hilo visual | Fondo al 20 %, superficie `neutral-100`, sombra y radio 8 px | Mismos presets/tokens | Pass |

Producción inserta un MP4 vertical de 112.225.142 bytes. Incluirlo en el theme rompería el presupuesto de assets y añadiría más de 112 MB al repositorio. La implementación conserva el estado visual inicial mediante su poster local; #15 decidirá una estrategia de video optimizado o alojamiento autorizado. Esta es una limitación técnica explícita, no una decisión silenciosa de diseño.

### Veredicto del issue

**Pass local con sustitución estática justificada; pendiente de review del PR.**

## Ejecución #7 — Los Resultados

Fecha: 2026-07-25<br>
Rama: `agent/7-pattern-resultados`<br>
Base de revisión: PR del issue #6

| Check | Resultado | Evidencia |
|---|---|---|
| PHP y JSON | Pass | Lint, JSON y whitespace sin errores. |
| Registro y render | Pass | `vicunav/resultados` produce un H2, una lista semántica de cinco resultados, una imagen y el copy exacto. |
| Asset | Pass | PNG de origen 1024×1280 y 1,6 MB convertido a WebP local de 67.184 bytes. |
| Frontend | Pass | HTTP 200, asset cargado y sin overflow horizontal. |
| Responsive | Pass funcional | Columns colapsa nativamente; el ajuste de ancho completo se desactiva en el breakpoint de WordPress. |

### Comparación visual a 1280×720

| Control | Referencia | Local | Veredicto |
|---|---:|---:|---|
| Sección | 1792×787,45 px | 1792×787,45 px | Pass |
| Imagen | 501,96×627,45 px | 502×627,5 px | Pass |
| H2 | Bodoni 48/48, peso 300 | Mismo preset y peso | Pass |
| Composición | Imagen izquierda; contenido derecha | 44/56 %, gap normalizado | Pass |

La auditoría del 2026-07-25 recuperó cuatro resultados que faltaban en el inventario inicial. El pattern incluye ahora los cinco textos, sus superficies escalonadas y sus iconos decorativos sin depender de assets remotos.

### Veredicto del issue

**Pass local; pendiente de review del PR.**

## Ejecución #8 — Debería Sentirse Como Tú

Fecha: 2026-07-25<br>
Rama: `agent/8-pattern-deberia-sentirse`<br>
Base de revisión: PR del issue #7

| Check | Resultado | Evidencia |
|---|---|---|
| PHP y JSON | Pass | Pattern sin errores y `theme.json` válido. |
| Registro y render | Pass | `vicunav/deberia-sentirse-como-tu` produce eyebrow, H2, párrafo y CTA exactos. |
| Enlace | Pass | “¡Hablemos!” apunta a la ruta local `/contacto/`. |
| Tokens | Pass | Fondo, color, tipografía, padding y CTA consumen presets; no requiere CSS propio. |
| Frontend | Pass | HTTP 200 y cero overflow horizontal. |

### Comparación visual a 1280×720

| Control | Referencia | Local | Veredicto |
|---|---:|---:|---|
| Sección | 1792×401,01 px | 1792×401,01 px | Pass |
| Contenido | 800 px | 800 px | Pass |
| H2 | 48/48 px, peso 300 | 48/48 px, peso 300 | Pass |
| Párrafo | 17/27,2 px | 17/27,2 px | Pass |
| CTA | 137×48 px | 137×48 px | Pass |
| Fondo | `neutral-300` | `neutral-300` | Pass |

El eyebrow “Sin presiones, ni tácticas raras”, omitido por el inventario inicial, se recuperó durante la auditoría del 2026-07-25 y quedó incorporado al contrato de contenido.

### Veredicto del issue

**Pass local; pendiente de review del PR.**

## Ejecución #9 — Conoce a Mario

Fecha: 2026-07-25<br>
Rama: `agent/9-pattern-conoce-a-mario`<br>
Base de revisión: PR del issue #8

| Check | Resultado | Evidencia |
|---|---|---|
| PHP | Pass | Pattern y functions sin errores; diff limpio. |
| Registro y render | Pass | `vicunav/conoce-a-mario` produce H2, subtítulo, tres párrafos completos y retrato. |
| Copy | Pass | Los tres párrafos coinciden literalmente con `AGENTS.md`. |
| Accesibilidad | Pass | Retrato informativo con alt que identifica a Mario y su rol. |
| Asset | Pass | WebP local 1024×1536, 62.166 bytes y checksum documentado. |
| Frontend | Pass | HTTP 200, imagen cargada y sin overflow horizontal. |

### Comparación visual a 1280×720

| Control | Referencia | Local | Veredicto |
|---|---:|---:|---|
| Sección | 1792×912,94 px | 1792×912,94 px | Pass |
| Columna de texto | 669,60 px, x=256 | 669,60 px, x=256 | Pass |
| Retrato | 501,96×752,94 px, x=999,82 | 502×753 px, x=999,80 | Pass |
| Gap entre columnas | 40 px | 40 px tokenizados | Pass |
| H2 | 48/48 px, dos líneas | 48/48 px, dos líneas | Pass |

La cuadrícula colapsa mediante el breakpoint nativo de Columns; el retrato conserva proporción intrínseca y ancho máximo tokenizado.

### Veredicto del issue

**Pass local; pendiente de review del PR.**

## Ejecución #33 — Marcas con las que he trabajado

Fecha: 2026-07-25<br>
Rama: `agent/33-pattern-marcas`<br>
Base de revisión: PR del issue #9

| Check | Resultado | Evidencia |
|---|---|---|
| PHP | Pass | Pattern y functions sin errores; diff limpio. |
| Registro y render | Pass | `vicunav/marcas` produce un H2 y cinco imágenes en el orden aprobado. |
| Copy | Pass | “Marcas con las que he trabajado” coincide literalmente con producción. |
| Accesibilidad | Pass | Cada logo conserva el nombre de la marca como texto alternativo. |
| Assets | Pass | Cinco WebP locales, 294.450 bytes combinados, con procedencia y checksums. |
| Frontend | Pass | HTTP 200, imágenes cargadas y sin overflow horizontal. |

### Comparación visual a 1792 px

| Control | Referencia | Local | Veredicto |
|---|---:|---:|---|
| Sección | 1792×304,74 px | 1792×304,74 px | Pass |
| Área de logos | 1248 px | 1248 px | Pass |
| Cada celda | 198,40 px | 198,40 px | Pass |
| Gap | 64 px | 64 px tokenizados | Pass |
| Superficie | `neutral-800` | `neutral-800` | Pass |

En 390×844 la cuadrícula colapsa a dos columnas, conserva las cinco marcas, no recorta logos y no genera overflow.

### Veredicto del issue

**Pass local; pendiente de review del PR.**

## Ejecución #10 — CTA final

Fecha: 2026-07-25<br>
Rama: `agent/10-pattern-cta-final`<br>
Base de revisión: PR del issue #33

| Check | Resultado | Evidencia |
|---|---|---|
| PHP y JSON | Pass | Lint, JSON y whitespace sin errores. |
| Registro y render | Pass | `vicunav/cta-final` produce H2, párrafo, botón y destino `/contacto/`. |
| Copy | Pass | H2, párrafo y CTA coinciden literalmente; conserva énfasis visual no semánticamente destructivo. |
| Tokens | Pass | Superficie translúcida, anchos, padding 120/61 y gap 40 viven en `theme.json`. |
| Teclado | Pass estático | CTA es un enlace nativo dentro de `core/button`, con foco y activación nativos. |
| Frontend | Pass | HTTP 200, un único H1 en la portada y sin overflow horizontal. |

### Comparación visual a 1792 px

| Control | Referencia | Local | Veredicto |
|---|---:|---:|---|
| Sección | 1792×648,8 px | 1792×648,8 px | Pass |
| Panel | 1100×408,8 px | 1100×408,8 px | Pass |
| Área textual | 900 px | 900 px | Pass |
| H2 | 900×96 px | 900×96 px | Pass |
| Párrafo | 900×60,8 px | 900×60,8 px | Pass |
| CTA | 317,4×50 px | 317,4×50 px | Pass |
| Superficie | `neutral-200` al 80 % | Preset `neutral-200-80` | Pass |

El fondo WebP local reproduce el encuadre de producción sin hotlink. En 390×844 el CSS reduce el padding exterior a 64 px y el panel a 32/24 px usando la escala global; el enlace mide 48 px de alto y no existe overflow.

### Veredicto del issue

**Pass local; pendiente de review del PR.**

## Hallazgo y corrección #21 — Footer

Fecha: 2026-07-20<br>
Referencia: footer vigente de `vicunav.com` inspeccionado en modo de solo lectura<br>
Entorno local: WordPress 7.0.2, PHP 8.2.29 y Chrome

La baseline aplicaba `neutral-900` a todo el footer. Producción usa una superficie principal `neutral-100` y reserva `neutral-900` para la franja legal. La corrección conserva el inventario exacto y normaliza las mediciones repetibles mediante presets y tres variables semánticas del componente.

| Control a 1440×900 | Referencia | Local corregido | Veredicto |
|---|---:|---:|---|
| Footer total | ≈1098 px | ≈1093 px | Pass; diferencia ≈5 px |
| Primera fila | 409,6 / 230,4 / 230,4 / 409,6 px | 409,6 / 230,4 / 230,4 / 409,6 px | Pass |
| Audiencias | 320 / 320 / 384 px, 20 % libre | 320 / 320 / 384 px, 20 % libre | Pass |
| Tagline | 24/28,8 px; 86,4 px de alto | 23/28,8 px; 86,4 px de alto | Pass |
| Descripción | 18/23,4 px; 140,4 px de alto | 18/23,4 px; 140,4 px de alto | Pass |
| Franja legal | ≈166 px | ≈171 px | Pass; diferencia ≈5 px |
| Colores | Superficie `neutral-100`; legal `neutral-900` | Mismos presets | Pass |

En 390×844, las dos filas de columnas colapsan en orden de lectura, el contenido conserva 20 px de margen lateral, no existe overflow horizontal y todos los enlaces permanecen en el DOM accesible. El ajuste estructural se registra junto a `core/columns`, por lo que se carga también en el Editor del sitio.

## Ejecución #22 — Acceso canónico al Editor del sitio

Fecha: 2026-07-20<br>
Entorno: WordPress 7.0.2, PHP 8.2.29 y sesión administradora local

| Control | Resultado | Veredicto |
|---|---|---|
| Enlace “Edit Page” de la portada | Apunta al template `vicunav//front-page` | Pass |
| URL directa `post.php?action=edit` de la portada | Redirige al lienzo `Front Page · Template` | Pass |
| Campo `Add title` | No aparece en el lienzo canónico | Pass |
| Diseño | Header, Hero y Footer visibles en el iframe del Site Editor | Pass |
| Validez de bloques | 0 avisos “Block contains unexpected or invalid content” | Pass |
| Otra página | Conserva su enlace normal a `post.php` | Pass |
| Permisos | El filtro y la redirección exigen `edit_theme_options` | Pass estático/funcional |

La solución no elimina la página Inicio, no modifica `show_on_front`, no borra contenido y no altera títulos de otras páginas. `README.md` documenta la ruta de edición de la portada y de las partes Cabecera/Pie de página.

## Ejecución #11 — Ensamblaje final de la portada

Fecha: 2026-07-25<br>
Rama: `agent/11-ensamblaje-portada`<br>
Base: `main` después de integrar #32, #27, #28, #29, #30, #34 y #31

| Check | Resultado | Evidencia |
|---|---|---|
| Template serializado | Pass | Header, diez referencias `core/pattern` y footer aparecen una sola vez y en el orden contractual. |
| Registro WordPress | Pass | Los diez slugs `vicunav/*` están registrados después de limpiar el cache de patterns del theme. |
| Render | Pass | 53.827 bytes, un H1 y ausencia de `post-content` o dependencia de Elementor. |
| Landmarks | Pass | Se corrigió el anidamiento de los template parts; frontend contiene exactamente un `header`, un `main` y un `footer`. |
| Frontend | Pass | HTTP 200, diez secciones únicas, 20 imágenes cargadas, sin overflow ni errores de consola. |
| Site Editor | Pass | Las diez secciones aparecen una vez, cero avisos de bloque inválido, cero errores de consola y sin campo “Add title”. |
| Estáticos | Pass | PHP lint, `jq`, whitespace, rutas locales, hotlinks y marcadores de debug sin hallazgos. |

WordPress agrega el landmark semántico al wrapper de cada `core/template-part`. Los archivos `parts/header.html` y `parts/footer.html` usaban además `tagName` con el mismo landmark, lo que generaba HTML anidado. #11 conserva las clases y composición visual, pero deja los grupos internos como `div`; el wrapper de WordPress aporta los únicos `header` y `footer`.

### Veredicto del issue

**Pass; integrado mediante PR #35.**

## Ejecución #12 — Comparación visual integral

Fecha: 2026-07-25<br>
Rama: `agent/12-qa-visual`<br>
Commit base probado: `ab47ba0`<br>
Entorno: navegador integrado del agente basado en Chromium, macOS, sesión anónima y viewport 1440×900

| Check | Resultado | Evidencia |
|---|---|---|
| Cobertura | Pass | Se compararon header, diez patterns y footer en seis pares de captura. |
| Condiciones equivalentes | Pass | Mismo navegador, viewport, zoom y posiciones de scroll equivalentes. |
| Copy y orden | Pass | Sin diferencias silenciosas; el inventario y la secuencia coinciden. |
| Geometría | Pass | Documento de 8530 px en producción y 8532 px local; delta total de 2 px. |
| Estilos y medios | Pass | Tipografía, color, espaciado, composición e imágenes equivalentes. |
| Desviaciones | Pass | Animaciones omitidas por contrato, H1 semántico correcto y poster del testimonio trazado en #15. |
| Integridad de evidencia | Pass | Doce WebP de 1440×900 con SHA-256 documentado. |

La evidencia completa, incluidas las alturas por sección, condiciones de captura, checksums, hallazgos y enlaces a los doce archivos, está en [docs/qa/evidence/phase-1/README.md](../../docs/qa/evidence/phase-1/README.md).

El mayor delta individual es 10,38 px en Situaciones, aproximadamente 1,46 % de la altura de la sección. Todas las demás secciones son idénticas o difieren menos de 7,2 px; la suma del documento queda a dos píxeles de producción. La revisión visual no encontró overflow, copy faltante, assets incorrectos ni cambios de lenguaje visual.

Las capturas de producción conservan estados intermedios de las animaciones de entrada de Elementor y pueden mostrar contenido atenuado. El theme no replica esas animaciones porque `AGENTS.md` las excluye expresamente de Fase 1. El contenido local se presenta completo de inmediato.

### Veredicto del issue

**Pass para Chromium desktop; listo para integrar.** La matriz responsive y entre navegadores permanece separada en #13.

## Ejecución #13 — Responsive y compatibilidad entre navegadores

Fecha: 2026-07-25<br>
Rama: `agent/13-qa-responsive-browser`<br>
Commit base probado: `5a01490`<br>
Entorno: macOS, Playwright 1.57.0, Chrome 150.0.7871.182, Firefox 144.0.2 y WebKit 26.0

| Check | Resultado | Evidencia |
|---|---|---|
| Matriz base | Pass | 360×800, 390×844, 768×1024, 844×390 y 1440×900 en tres motores. |
| Zoom y reflow | Pass | 720 px equivalentes a 200 % y 320 px equivalentes a 400 %, en tres motores. |
| Overflow | Pass | `scrollWidth === clientWidth` en los 21 recorridos. |
| Contenido y medios | Pass | Diez secciones, un H1 y 20/20 imágenes cargadas en cada recorrido. |
| Navegación móvil | Pass | Cuatro destinos; abre, cierra con `Escape` y devuelve el foco. |
| Navegación amplia | Pass | Cuatro destinos visibles desde 720 px. |
| Landmarks | Pass | Un `header`, un `main` y un `footer`. |
| Consola | Pass | Cero errores de consola y cero excepciones de página. |
| Evidencia visual | Pass | Nueve capturas representativas con checksums y revisión manual. |

La evidencia reproducible, matriz completa, condiciones, acomodación local de Firefox y SHA-256 está en [docs/qa/evidence/phase-1/responsive/README.md](../../docs/qa/evidence/phase-1/responsive/README.md).

Firefox requirió desactivar HTTP/2 en el perfil aislado de prueba porque LocalWP mantenía abierto el evento de navegación con ese binario. La portada ya estaba renderizada y el cambio a HTTP/1.1 eliminó el comportamiento del servidor local; no se modificó el theme. Chrome y WebKit no necesitaron esta acomodación.

### Veredicto del issue

**Pass; listo para integrar.** No se encontraron defectos responsive ni específicos de motor.

## Ejecución #14 — Accesibilidad WCAG 2.2 AA

Fecha: 2026-07-25<br>
Rama: `agent/14-qa-accesibilidad`<br>
Commit probado: `c23602f`<br>
Entorno: WordPress 7.0.2, PHP 8.2.29, axe-core 4.12.1, Chrome 150 y WebKit 26

| Check | Resultado | Evidencia |
|---|---|---|
| WCAG automatizado | Pass | Cuatro estados; cero violaciones con tags 2.0/2.1/2.2 A/AA. |
| Buenas prácticas | Pass | 17 reglas aprobadas; cero violaciones o incompletos. |
| Contraste | Pass | Email corregido a 10,97:1; fondos complejos muestreados entre 9,19:1 y 20,57:1. |
| Idioma | Pass | LocalWP configurado en `es_ES`; documento declara `lang="es"`. |
| Teclado y foco | Pass | 21 controles desktop; indicador bicolor; orden lógico y sin foco oculto. |
| Overlay móvil | Pass | Foco contenido, `Shift+Tab`, `Escape` y devolución al disparador. |
| Semántica | Pass | Headings sin saltos, landmarks únicos, listas/cita y nombres accesibles. |
| Medios | Pass | 20 alt revisados; decorativos vacíos y contenido contextual. |
| Reflow/texto | Pass | 320 CSS px, zoom equivalente a 200 %/400 % y texto 200 % sin pérdida. |
| Preferencias | Pass | Movimiento reducido y colores forzados sin pérdida funcional. |
| Árbol accesible | Pass | WebKit expone banner, nav, main y contentinfo en orden lógico. |

Se corrigieron cinco hallazgos: idioma de la instalación, contraste del email, nombres de navegación, foco bicolor y gutter del overlay. La evidencia completa con scanner, ratios, revisión manual y capturas está en [docs/qa/evidence/phase-1/accessibility/README.md](../../docs/qa/evidence/phase-1/accessibility/README.md).

### Veredicto del issue

**Pass; listo para integrar.** Cero violaciones A/AA bloqueantes permanecen abiertas.

## Controles estáticos por pattern/template

Registrar comando, versión y salida en el PR correspondiente:

```bash
jq empty theme.json
git diff --check
rg '#[0-9A-Fa-f]{3,8}|font-family' parts patterns templates
php -l patterns/<archivo>.php
rg -n 'TODO|FIXME|debug|/Users/|vicunav-gutenberg\.local|https?://' patterns parts templates assets
```

El resultado de búsquedas se revisa manualmente: una URL de enlace aprobada no es igual a un hotlink de asset; un hex dentro de `theme.json` es válido y uno dentro de un pattern no.

## Smoke de WordPress

| Control | Resultado esperado | Issue de evidencia | Estado |
|---|---|---:|---|
| `wp theme status vicunav` | Theme activo | #11 | Pass sobre `main` integrado |
| `parse_blocks()` | Parts, patterns y template procesados | #3–#11 | Pass; diez patterns registrados |
| `do_blocks()` | Salida no vacía y sin fatal | #3–#11 | Pass; 53.827 bytes renderizados |
| Homepage | HTTP 200; contiene header, `main` y footer | #11 | Pass; orden completo verificado |
| Site Editor | Sin bloques inválidos; intención equivalente | #11/#12 | Pass; diez secciones presentes y cero bloques inválidos |
| Logs/consola | Sin warnings PHP ni errores de navegador | #11/#16 | Pass en Chromium; gate final pendiente |

### Gate integral sobre `main`

Fecha: 2026-07-25<br>
Commit base probado: `70dd576`; corrección estructural en `agent/11-ensamblaje-portada`<br>
Entorno: runtime PHP 8.2.29 de LocalWP, socket MySQL identificado por `home/siteurl`, WordPress 7.0.2 y Chromium

| Control | Resultado | Veredicto |
|---|---|---|
| Theme y base de datos | `vicunav` activo; `wp-load.php` carga sin respuesta HTML de error | Pass |
| Registro | Los diez patterns `vicunav/*` de la portada están registrados | Pass |
| Render integral | 53.827 bytes; un H1, nueve H2 y 24 elementos de lista | Pass |
| Orden | Hero → situaciones → introducción → proceso → testimonio → resultados → debería sentirse → Mario → marcas → CTA | Pass |
| Copy contractual | Todas las agujas de `content-inventory.md` presentes | Pass |
| Estáticos | PHP lint, JSON, `git diff --check`, hotlinks y rutas locales | Pass |
| Frontend | HTTP 200, 20 imágenes cargadas, cero assets remotos y consola sin errores del theme | Pass |
| Responsive 390×844 | Ancho cliente y scroll de 390 px; cero elementos desbordados | Pass |
| Targets móviles | Todos los CTA visibles miden al menos 48 px de alto | Pass |
| Site Editor | Diez secciones presentes; cero avisos de bloque inválido; sin campo “Add title” | Pass |

Los únicos literales CSS fuera de tokens son hairlines de `1px`, una compensación óptica de `2px`, aspect ratios y breakpoints estructurales. No representan decisiones reutilizables de color, tipografía, superficie o espaciado. Los PRs de sección se integraron por squash manteniendo un commit atómico por unidad.

## Comparación visual

Para cada fila, capturar referencia y LocalWP con mismo navegador, viewport, estado de navegación, contenido, cache y fecha.

| Área | 390×844 | 768×1024 | 1440×900 | Evidencia | Estado |
|---|---|---|---|---|---|
| Header + navegación | Pass | Pass | Pass | #12/#13 | Aprobado en tres motores |
| Hero | Pass | Pass | Pass | #3/#12/#13 | Aprobado en tres motores |
| Situaciones | Pass | Pass | Pass | #4/#12/#13 | Aprobado en tres motores |
| Cómo ayudamos | Pass | Pass | Pass | #5/#12/#13 | Aprobado en tres motores |
| Testimonio | Pass | Pass | Pass | #6/#12/#13/#15 | Responsive aprobado; video pendiente en #15 |
| Resultados | Pass | Pass | Pass | #7/#12/#13 | Aprobado en tres motores |
| Debería sentirse | Pass | Pass | Pass | #8/#12/#13 | Aprobado en tres motores |
| Conoce a Mario | Pass | Pass | Pass | #9/#12/#13 | Aprobado en tres motores |
| Marcas | Pass | Pass | Pass | #33/#12/#13 | Aprobado en tres motores |
| CTA final | Pass | Pass | Pass | #10/#12/#13 | Aprobado en tres motores |
| Footer | Pass | Pass | Pass | #12/#13 | Aprobado en tres motores |

## Accesibilidad manual

Owner: #14.

- [x] Recorrido completo con `Tab`, `Shift+Tab`, `Enter`, `Space` y `Escape`.
- [x] Foco visible, no oculto y con orden coherente.
- [x] Menú overlay abre, cierra, contiene y devuelve foco correctamente.
- [x] Un `h1`; headings y landmarks con jerarquía lógica.
- [x] Nombres accesibles de logo, navegación, enlaces, botones e iconos.
- [x] Alt text contextual; imágenes decorativas con `alt=""`.
- [x] Contraste y targets conforme a WCAG 2.2 AA.
- [x] Zoom 200 %, reflow a 320 CSS px y texto aumentado sin pérdida.
- [x] `prefers-reduced-motion` y contraste forzado cuando aplique.
- [x] Smoke del árbol accesible WebKit/Safari para navegación principal.
- [x] Scan automatizado sin violaciones críticas o serias, complementado por revisión manual.

## Rendimiento

Owner: #15. Registrar mediana de al menos tres corridas móviles comparables.

| Métrica/asset | Baseline | Resultado | Budget | Estado |
|---|---:|---:|---:|---|
| Lighthouse Performance | Por medir | — | ≥ 90 | Pendiente |
| LCP laboratorio | Por medir | — | ≤ 2.5 s objetivo | Pendiente |
| CLS | Por medir | — | ≤ 0.1 | Pendiente |
| TBT laboratorio | Por medir | — | Sin regresión significativa | Pendiente |
| JavaScript propio | 0 KB | — | 0 KB | Pendiente |
| Fuentes iniciales | TTF sin baseline transferida | — | ≤ 250 KB | Pendiente |
| Imagen hero | No incorporada | — | ≤ 250 KB | Pendiente |
| Recursos de terceros en primer render | Por medir | — | 0 | Pendiente |

## Seguridad y release

Owner: #16.

- [ ] Sin secretos, credenciales, dumps, logs ni datos personales en Git.
- [ ] Sin rutas absolutas del entorno ni URLs locales en el artefacto.
- [ ] Assets con procedencia/licencia y sin scripts incrustados.
- [ ] URLs PHP escapadas; sin input, queries o APIs innecesarias.
- [ ] Theme Check sin errores de seguridad bloqueantes.
- [ ] `style.css`, `CHANGELOG.md` y tag propuesto usan la misma versión.
- [ ] ZIP probado sin symlink, `.git`, `.github`, caches ni archivos locales.
- [ ] Producción no se modifica durante el gate.

## Registro de diferencias y riesgos residuales

| Fecha | Área | Diferencia/riesgo | Evidencia | Decisión/issue | Estado |
|---|---|---|---|---|---|
| 2026-07-23 | Testimonio | El video de producción pesa 112.225.142 bytes; el theme conserva el estado visual inicial con un poster local | `SOURCES.md` y QA #6 | Definir video optimizado o alojamiento autorizado en #15 | Abierto |
| 2026-07-23 | Copy | La auditoría encontró copy adicional en proceso, resultados y debería sentirse | Comparación visual #5, #7 y #8 | Inventario, spec y patterns actualizados con copy literal | Resuelto |
| 2026-07-23 | Integración | GitHub está configurado para squash merge; una pila retiene ancestros ya integrados | PRs #25–#34 | Se reconstruyó y retargeteó cada PR después de su merge | Resuelto |
| 2026-07-25 | Movimiento | Las capturas de producción muestran estados atenuados por animaciones de entrada de Elementor | Evidencia visual #12 | Omitir animaciones según `AGENTS.md`; contenido local visible de inmediato | Resuelto por contrato |
| 2026-07-25 | Semántica | La jerarquía H1 de Elementor no coincide con el inventario contractual | Render y evidencia #11/#12 | Mantener un único H1 correcto en el hero | Resuelto por contrato |
| 2026-07-25 | Entorno QA | Firefox aislado no completaba el evento de carga sobre HTTP/2 de LocalWP | Evidencia #13 | Ejecutar el perfil local con HTTP/1.1; DOM y theme no cambian | Resuelto en harness |
| 2026-07-25 | Accesibilidad | Email 2,93:1, idioma inglés, nav sin nombre útil y foco parcial/insuficiente | Evidencia #14 | Tokens existentes, labels explícitos, `es_ES` y foco bicolor con gutter | Resuelto |

Una preferencia visual no puede registrarse como limitación. Toda excepción A/AA, de seguridad o de pérdida de contenido bloquea release.

## Veredicto de Fase 1

**Pendiente.** Los diez patterns y #11 están integrados; #12–#14 pasan comparación visual, responsive, motores y accesibilidad. Los issues #15–#16 todavía deben completar rendimiento/assets, seguridad y release. Solo #16 puede proponer `Pass` sobre el commit candidato; esto no autoriza despliegue a producción.
