# Plan: clon exacto del homepage en Gutenberg

Spec: `specs/1-clon-homepage/spec.md`<br>
Issue padre: #1<br>
Estado: Draft para aprobación

## Resumen técnico

La implementación conserva el block theme actual y añade una capa de composición nativa: cada sección vive en un pattern PHP registrado, `templates/front-page.html` los inserta por slug y los template parts existentes delimitan header/footer. Los bloques core y los presets de `theme.json` producen el markup y estilos; no se añade framework, bloque custom ni JavaScript propio.

El trabajo se entrega en el orden definido por las dependencias de GitHub. Cada issue de sección genera un PR revisable y evidencia proporcional. La comparación integral sucede después de ensamblar el template, y los gates responsive, accesibilidad y rendimiento alimentan el release candidate final.

## Archivos afectados

| Ruta | Cambio | Motivo |
|---|---|---|
| `patterns/hero.php` | Nuevo pattern registrado | Implementar AC-02. |
| `patterns/situaciones.php` | Nuevo pattern registrado | Implementar AC-03. |
| `patterns/como-ayudamos.php` | Nuevo pattern registrado | Implementar AC-04. |
| `patterns/testimonio.php` | Nuevo pattern registrado | Implementar AC-05. |
| `patterns/resultados.php` | Nuevo pattern registrado | Implementar AC-06. |
| `patterns/deberia-sentirse-como-tu.php` | Nuevo pattern registrado | Implementar AC-07. |
| `patterns/conoce-a-mario.php` | Nuevo pattern registrado | Implementar AC-08. |
| `patterns/cta-final.php` | Nuevo pattern registrado | Implementar AC-09. |
| `templates/front-page.html` | Nuevo template FSE | Ensamblar AC-10 y establecer el landmark `main`. |
| `assets/images/` | Añadir assets aprobados y optimizados | Evitar hotlinks y cumplir RD-07–RD-09. |
| `assets/fonts/` | Sustituir TTF por WOFF2/subsets cuando #15 lo valide | Cumplir RNF-02 sin cambiar la apariencia. |
| `theme.json` | Añadir el token fluido `site-gutter` en #19 | La comparación del header demostró que los presets fijos no reproducen el margen responsive de la referencia. |
| `parts/header.html` | Corregir dimensiones, casing y selector de idioma mediante #19 | QA demostró incumplimiento reproducible de AC-01. |
| `parts/footer.html` | Sin cambio previsto; corrección solo si QA demuestra incumplimiento | Baseline terminada, cubierta por AC-01. |
| `specs/1-clon-homepage/qa.md` | Actualización progresiva | Consolidar evidencia AC-01–AC-15. |
| `functions.php` | Registrar en #19 una hoja específica mediante `wp_enqueue_block_style()` | Core Navigation no expone bandera ni etiqueta móvil como atributos; el registro cubre frontend/editor y carga solo con el bloque. |
| `assets/css/header.css` | CSS estructural mínimo para logo, bandera y etiqueta móvil del menú en #19 | No se hardcodean colores ni familias; consume presets de `theme.json`. |
| `style.css` | Sin CSS visual; release docs en #16 | Conserva únicamente metadata del theme. |
| `CHANGELOG.md` | Actualización en #16 | Preparar versión coherente del release candidate. |

El issue #19 demuestra la única necesidad actual de `functions.php`: registrar con la API estándar una hoja específica de bloque que WordPress cargue en frontend y editor. No se añade lógica de negocio ni JavaScript.

## Bloques, APIs y tokens

### Bloques core previstos

- Composición: `core/group`, `core/columns`, `core/column`, `core/cover` cuando corresponda.
- Contenido: `core/heading`, `core/paragraph`, `core/list`, `core/quote`, `core/image`.
- Acciones: `core/buttons`, `core/button`.
- Reutilización: `core/template-part` y `core/pattern` desde el template.
- Navegación: el `core/navigation` existente en header/footer.

La selección final de bloques dentro de cada sección debe reproducir la semántica de la referencia. No se usa un bloque por conveniencia si altera el orden de lectura o el significado.

### Presets y tokens

- Colores: `primary`, `secondary`, `text`, `accent` y `neutral-100`–`neutral-900`.
- Familias: `body`, `heading`, `accent-serif`, `handwritten`.
- Tamaños y espaciado: únicamente slugs definidos en `theme.json`.
- Layout: `contentSize` 800 px y `wideSize` 1280 px como baseline, sin convertirlos en valores repetidos dentro de patterns.

### APIs WordPress

- Registro automático de patterns por archivos bajo `patterns/` y sus headers.
- Referencias `wp:pattern` con slugs `vicunav/*` dentro de `front-page.html`.
- `get_theme_file_uri()` o `get_template_directory_uri()` más `esc_url()` solo cuando un asset de pattern necesite una URL portable generada en PHP.
- Carga de fuentes declarada en `theme.json`; no usar `wp_enqueue_script()` en Fase 1.

### Assets

- Raster local en WebP o AVIF cuando el navegador/flujo de WordPress lo soporte.
- Dimensiones intrínsecas o `aspect-ratio` para reservar espacio.
- Hero/LCP sin lazy-load; contenido posterior con carga nativa diferida cuando corresponda.
- SVG únicamente de fuente confiable, sanitizado y sin scripts.
- Licencias de fuentes conservadas junto al asset.

## Flujo de implementación

1. Aprobar este paquete SDD y cerrar #2 mediante PR.
2. Corregir en #19 la baseline visual del header detectada durante la revisión del Hero.
3. Implementar #3 hero, aprobar su asset local y crear `front-page.html` como ensamblaje incremental revisable.
4. Implementar en orden #4 situaciones, #5 cómo ayudamos, #6 testimonio, #7 resultados, #8 debería sentirse, #9 conoce a Mario y #10 CTA final; cada PR añade su pattern al template incremental.
5. Completar y verificar el ensamblaje de los ocho patterns mediante #11.
6. Completar comparación visual 1:1 de página completa en #12.
7. Ejecutar en paralelo, una vez aprobada la comparación base: #13 responsive/navegadores, #14 accesibilidad y #15 rendimiento/assets.
8. Corregir defectos en el issue que introdujo el comportamiento; no ampliar silenciosamente el gate de QA.
9. Ejecutar #16 sobre un commit candidato, consolidar `qa.md`, changelog y versión, y preparar revisión de release sin desplegar producción.
10. Cerrar #1 únicamente cuando AC-01–AC-16 tengan evidencia y todos los sub-issues estén cerrados.

## Diseño de los patterns

Cada archivo debe:

1. declarar `Title`, `Slug`, `Categories` y `Block Types`;
2. usar un slug único bajo `vicunav/`;
3. contener una sola sección y su copy completo;
4. usar bloques core y presets serializados válidos;
5. mantener un contenedor exterior identificable para QA sin añadir clases visuales arbitrarias;
6. evitar datos dependientes de la base de datos y rutas absolutas;
7. renderizar en frontend y Site Editor sin divergencia intencional.

## Composición de `front-page.html`

```text
core/template-part header
main
  vicunav/hero
  vicunav/situaciones
  vicunav/como-ayudamos
  vicunav/testimonio
  vicunav/resultados
  vicunav/deberia-sentirse-como-tu
  vicunav/conoce-a-mario
  vicunav/cta-final
core/template-part footer
```

El template solo ensambla. No copia el markup de los patterns ni añade post content, query loops o secciones fuera del inventario.

## Alternativas consideradas

| Alternativa | Ventajas | Costes | Decisión |
|---|---|---|---|
| Mantener Elementor | Cero migración inmediata | Dependencia y markup existentes; no cumple el objetivo Gutenberg | Rechazada. |
| Guardar todo como contenido de una página | Edición directa | Pierde estructura versionada, trazabilidad y composición reutilizable | Rechazada. |
| Escribir todo dentro de `front-page.html` | Menos archivos | Template monolítico, difícil de revisar y contrario a la arquitectura | Rechazada. |
| Crear bloques custom | Control total | Build, JavaScript y mantenimiento innecesarios para contenido estático | Rechazada en Fase 1. |
| Partir de un theme o child theme | Baseline rápida | Hereda decisiones ajenas y contradice el encargo desde cero | Rechazada. |
| Cargar Google Fonts remotamente | Menos assets locales | Privacidad, disponibilidad y rendimiento menos controlables | Rechazada. |
| CSS global para replicar cada detalle | Flexibilidad | Divergencia editor/frontend y tokens dispersos | Solo último recurso estructural, con justificación y spec actualizado. |

## Compatibilidad y migración

- La implementación se valida en WordPress 7.0.2/PHP 8.2 y antes del release contra WordPress 6.7 y PHP 8.0 o se documenta un entorno reproducible equivalente.
- No se modifica la base de datos ni se importan layouts de Elementor.
- Las páginas fuera del homepage continúan fuera de alcance aunque reciban enlaces desde la navegación.
- Los overrides guardados por el Site Editor deben detectarse antes de atribuir una diferencia a los archivos del theme.
- El symlink de LocalWP es infraestructura local y no forma parte del artefacto distribuible.

## Accesibilidad

- Un único `h1`; headings posteriores en orden lógico.
- Landmarks `header`, `nav`, `main` y `footer` reconocibles.
- Checks decorativos ocultos a tecnología asistiva o integrados sin repetición; el contenido usa semántica de lista.
- Testimonio con semántica de cita cuando sea compatible con la composición de referencia.
- Alt text por propósito: informativo cuando aporta contenido y `alt=""` cuando es decorativo.
- Menú overlay, enlaces y CTAs operables por teclado, con foco visible y retorno correcto.
- Reflow a 320 CSS px, zoom 200 %, targets y contraste según `docs/ACCESSIBILITY.md`.

## Rendimiento

- Cero JavaScript propio y cero frameworks de estilos.
- Imagen hero optimizada, prioritaria y sin lazy-load; imágenes posteriores diferidas.
- Conversión/subsetting WOFF2 se realiza en #15 porque requiere comparar métricas y capturas.
- Medición Lighthouse móvil: al menos tres corridas comparables, cache y throttling registrados.
- Si un preload no mejora LCP medido, no se añade.

## Seguridad y privacidad

- Patterns PHP contienen contenido estático; no aceptan input ni ejecutan consultas.
- Toda URL generada en PHP se escapa con `esc_url()`.
- No se introducen formularios, nonces, endpoints, cookies, telemetría o scripts de terceros.
- Buscar secretos, rutas locales, dumps, debug y URLs remotas antes de cada PR.
- Verificar procedencia/licencia de assets antes de integrarlos.

## Estrategia QA

| Criterio | Prueba | Evidencia |
|---|---|---|
| AC-01 | Render de theme, inspección de header/footer y comparación integral | Salida smoke + capturas #12 |
| AC-02–AC-09 | PHP lint, parse/render del pattern, copy exacto y comparación visual por sección | PR de #3–#10 |
| AC-10 | Parse/render de `front-page.html`, orden y respuesta HTTP 200 | PR #11 |
| AC-11 | Capturas referencia/local en mismos viewports y revisión de diferencias | `qa.md` + PR #12 |
| AC-12 | Matriz 390×844, 768×1024, 1440×900 en Chrome/Safari/Firefox | `qa.md` + PR #13 |
| AC-13 | Scanner + teclado, foco, landmarks, reflow, contraste y VoiceOver smoke | `qa.md` + PR #14 |
| AC-14 | Peso de assets y mediana de tres Lighthouse móviles | `qa.md` + PR #15 |
| AC-15 | Theme Check, revisión de seguridad, versión/changelog y árbol limpio | `qa.md` + PR #16 |
| AC-16 | Consistency check Constitución ↔ spec ↔ plan ↔ tasks ↔ diff ↔ evidencia | Comentario de cierre #1 |

Controles disponibles desde el inicio:

```bash
jq empty theme.json
git diff --check
rg '#[0-9A-Fa-f]{3,8}|font-family' parts patterns templates
php -l patterns/<archivo>.php
```

El smoke de WordPress usa la instalación LocalWP y respeta el procedimiento de socket definido en `AGENTS.md`. Un error HTML de base de datos cuenta como fallo aunque PHP termine con código 0.

## Rollback

Cada sección se revierte mediante el PR/commit de su issue. Antes de ensamblar, eliminar un pattern no afecta datos. Después de ensamblar, el rollback debe retirar primero su referencia de `front-page.html` o revertir ambos commits en orden seguro.

El release no ejecuta migraciones; volver al artefacto anterior restaura la presentación. Producción solo se modifica mediante un proceso posterior con autorización explícita.

## ADR requerido

No. El plan aplica decisiones ya ratificadas. Se exige ADR si aparece la necesidad de un bloque custom, JavaScript propio, una dependencia, un cambio de compatibilidad o una excepción transversal a tokens/patterns.
