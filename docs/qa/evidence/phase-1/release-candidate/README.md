# Evidencia del release candidate de Fase 1

Issue: #16<br>
Commit probado: `356e341`<br>
Versión: `0.2.0`<br>
Fecha: 2026-07-25<br>
Responsable: @mariovicunadev

## Resultado

El commit probado satisface el gate técnico de Fase 1 y produce un ZIP candidato reproducible, sin desplegar ni modificar producción.

## Entorno

- WordPress local: 7.0.2
- PHP de LocalWP: 8.2.29
- Locale: `es_ES`
- Theme: `vicunav`, activo por symlink al repositorio
- Theme Check: 20231220
- Navegador del smoke: Chrome 150, 390×844 CSS px, usuario anónimo
- URL: `https://vicunav-gutenberg.local/`

Las pruebas que cargan WordPress usaron el runtime PHP y el socket MySQL específicos de LocalWP. No se imprimieron contraseñas, salts ni credenciales.

## Gate estático

| Control | Resultado |
|---|---|
| PHP lint | Pass en `functions.php` y los diez patterns |
| `theme.json` | JSON válido |
| Markup de bloques | 144 bloques analizados; 0 tipos sin registrar |
| Patterns | 10 registrados bajo `vicunav/*`, en el orden contractual |
| JavaScript propio | 0 archivos, 0 bytes |
| Versionado | `style.css`, `readme.txt` y `CHANGELOG.md` coinciden en 0.2.0 |
| Whitespace | `git diff --check` sin hallazgos |

## Theme Check

Theme Check devuelve `PASS=yes` tanto contra el theme activo como contra la carpeta extraída del ZIP.

No existen resultados `REQUIRED` ni `WARNING`. Permanecen dos recomendaciones no bloqueantes dirigidas a la transición de themes clásicos:

- `register_block_pattern`: no aplica; WordPress registra automáticamente cada archivo de `patterns/` mediante su header `Slug`.
- `register_block_style`: no aplica; el theme no crea variaciones seleccionables de estilo. Sus hojas específicas se adjuntan a bloques core mediante `wp_enqueue_block_style()`.

Los dos mensajes `INFO` confirman un único text domain (`vicunav`) y la ausencia opcional de tags de directorio.

## Seguridad y privacidad

| Superficie | Revisión | Resultado |
|---|---|---|
| Entrada administrativa | `$_GET` solo en la redirección de portada; `wp_unslash`, `absint`, `sanitize_key` y allowlist de acción | Pass |
| Autorización | Redirección limitada por `current_user_can( 'edit_theme_options' )` | Pass |
| Redirección | Destino construido con `admin_url`/`add_query_arg` y enviado por `wp_safe_redirect` | Pass |
| Salida dinámica | URLs con `esc_url`; texto con `esc_html_x`; HTML editorial con `wp_kses_post` | Pass |
| Formularios/iframes | No existen en el alcance | Pass |
| Enlaces | Sin `javascript:`, ventanas nuevas ni destinos remotos inesperados | Pass |
| Recursos | Cero requests HTTP de terceros; fuentes e imágenes locales | Pass |
| Secretos | Sin firmas de tokens, private keys, dumps, logs, `.env` o credenciales | Pass |
| Dependencias | Sin paquetes runtime ni JavaScript propio | Pass |

Los headers de servidor, CSP y HSTS se validan en staging antes de un despliegue; no se atribuyen al theme ni se modifican desde este issue.

## Smoke del frontend

| Control | Resultado |
|---|---|
| HTTP | 200 sobre HTTP/2 |
| Documento | `lang="es"`, un H1, diez secciones y veinte imágenes |
| Responsive | 0 px de overflow horizontal a 390×844 |
| Menú móvil | Abre y cierra con el módulo nativo de `core/navigation` |
| Assets | `style.css?ver=0.2.0`; 0 requests fallidos |
| Consola | 0 errores; 0 excepciones de página |
| PHP | `WP_DEBUG=false`; no existe `debug.log`; render sin errores de base de datos |

La matriz completa ya aprobada permanece en:

- [comparación visual](../README.md);
- [responsive y navegadores](../responsive/README.md);
- [accesibilidad WCAG 2.2 AA](../accessibility/README.md);
- [rendimiento](../performance/README.md).

## Artefacto

Comando reproducible:

```bash
git archive \
  --format=zip \
  --prefix=vicunav/ \
  --output=/private/tmp/vicunav-0.2.0.zip \
  356e341
```

| Campo | Valor |
|---|---|
| Archivo | `vicunav-0.2.0.zip` |
| Peso | 1.183.399 bytes |
| SHA-256 | `84562ad4d6dbe55adf55590b4c38534a8fe22c0fd5865223b18a0ca57bd1a042` |
| Archivos | 65 |
| Raíz | una carpeta `vicunav/` |
| Symlinks | 0 |

El artefacto contiene únicamente runtime, `CHANGELOG.md`, `readme.txt`, screenshot y documentación/licencias de assets. `.github`, `.git`, docs internas, specs, evidencia QA, rutas LocalWP y archivos del sistema quedan excluidos mediante `.gitattributes`.

El ZIP se extrajo y se sometió a PHP lint, validación JSON, búsqueda de secretos/rutas locales y Theme Check desde la carpeta extraída. La instalación y activación del ZIP en staging permanece como gate de despliegue posterior; producción está explícitamente fuera del alcance.

## Trazabilidad de issues

Los issues #2–#15, #19, #21, #22 y #33 están cerrados. Al preparar esta evidencia solo permanecen abiertos #16 y su padre #1. Los issues #21 y #22 fueron cerrados administrativamente después de comprobar sus implementaciones ya integradas en los PR #23 y #24.

## Veredicto

**Pass para el commit candidato de #16.** No quedan errores bloqueantes de theme, seguridad, render, accesibilidad, responsive o rendimiento. El merge del PR debe ir seguido de un smoke sobre el SHA resultante de `main`; después puede cerrarse #1 sin crear tag ni desplegar producción.
