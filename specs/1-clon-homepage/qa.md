# QA: clon exacto del homepage en Gutenberg

Issue padre: #1<br>
Estado: Baseline definida; ejecución pendiente por sub-issue<br>
Responsable: @mariovicunadev<br>
Última actualización: 2026-07-20

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
| AC-01 | #12/#19/#21 | Render + comparación header/footer | Capturas y smoke | Header en corrección mediante #19; footer corregido localmente en #21 |
| AC-02 | #3 | Pattern hero | Lint, render, copy, asset y comparación visual | Pass local; pendiente de review |
| AC-03 | #4 | Pattern situaciones | Lint, lista/checks y captura | Pendiente |
| AC-04 | #5 | Pattern cómo ayudamos | Lint, render, copy y captura | Pendiente |
| AC-05 | #6 | Pattern testimonio | Lint, cita y captura | Pendiente |
| AC-06 | #7 | Pattern resultados | Lint, render, copy y captura | Pendiente |
| AC-07 | #8 | Pattern debería sentirse | Lint, CTA y captura | Pendiente |
| AC-08 | #9 | Pattern conoce a Mario | Lint, bio, alt/assets y captura | Pendiente |
| AC-09 | #10 | Pattern CTA final | Lint, teclado, destino y captura | Pendiente |
| AC-10 | #3/#11 | Template incremental y cierre del ensamblaje | Parse, render, HTTP 200, orden y Site Editor | En progreso: header → Hero → footer |
| AC-11 | #12 | Comparación sección por sección | Capturas/diff con commit y viewport | Pendiente |
| AC-12 | #13 | Responsive + navegadores | Matriz y defectos resueltos | Pendiente |
| AC-13 | #14 | WCAG 2.2 AA | Scanner + revisión manual | Pendiente |
| AC-14 | #15 | Assets + rendimiento | Peso, fuentes y Lighthouse ×3 | Pendiente |
| AC-15 | #16 | Gate final | Theme Check, seguridad y release docs | Pendiente |
| AC-16 | #1 | Consistency check y cierre | Todos los sub-issues/evidencia | Pendiente |

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

Fecha: 2026-07-23<br>
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
| `wp theme status vicunav` | Theme activo | #11 | Pendiente |
| `parse_blocks()` | Parts, patterns y template procesados | #3–#11 | Pendiente |
| `do_blocks()` | Salida no vacía y sin fatal | #3–#11 | Pendiente |
| Homepage | HTTP 200; contiene header, `main` y footer | #11 | Pendiente |
| Site Editor | Sin bloques inválidos; intención equivalente | #11/#12 | Pendiente |
| Logs/consola | Sin warnings PHP ni errores de navegador | #11/#16 | Pendiente |

## Comparación visual

Para cada fila, capturar referencia y LocalWP con mismo navegador, viewport, estado de navegación, contenido, cache y fecha.

| Área | 390×844 | 768×1024 | 1440×900 | Evidencia | Estado |
|---|---|---|---|---|---|
| Header + navegación | — | — | — | #12/#13 | Pendiente |
| Hero | — | — | — | #3/#12 | Pendiente |
| Situaciones | — | — | — | #4/#12 | Pendiente |
| Cómo ayudamos | — | — | — | #5/#12 | Pendiente |
| Testimonio | — | — | — | #6/#12 | Pendiente |
| Resultados | — | — | — | #7/#12 | Pendiente |
| Debería sentirse | — | — | — | #8/#12 | Pendiente |
| Conoce a Mario | — | — | — | #9/#12 | Pendiente |
| CTA final | — | — | — | #10/#12 | Pendiente |
| Footer | — | — | — | #12/#13 | Pendiente |

## Accesibilidad manual

Owner: #14.

- [ ] Recorrido completo con `Tab`, `Shift+Tab`, `Enter`, `Space` y `Escape`.
- [ ] Foco visible, no oculto y con orden coherente.
- [ ] Menú overlay abre, cierra, contiene y devuelve foco correctamente.
- [ ] Un `h1`; headings y landmarks con jerarquía lógica.
- [ ] Nombres accesibles de logo, navegación, enlaces, botones e iconos.
- [ ] Alt text contextual; imágenes decorativas con `alt=""`.
- [ ] Contraste y targets conforme a WCAG 2.2 AA.
- [ ] Zoom 200 %, reflow a 320 CSS px y texto aumentado sin pérdida.
- [ ] `prefers-reduced-motion` y contraste forzado cuando aplique.
- [ ] Smoke de VoiceOver/Safari para navegación principal.
- [ ] Scan automatizado sin violaciones críticas o serias, complementado por revisión manual.

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
| — | — | Sin diferencias registradas todavía | — | — | Pendiente de ejecución |

Una preferencia visual no puede registrarse como limitación. Toda excepción A/AA, de seguridad o de pérdida de contenido bloquea release.

## Veredicto de Fase 1

**Pendiente.** Solo #16 puede proponer `Pass` después de completar la matriz y probar el commit candidato. El cierre de #1 requiere revisión y aceptación del resultado; no autoriza despliegue a producción.
