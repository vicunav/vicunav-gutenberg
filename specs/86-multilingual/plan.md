# Plan: experiencia multidioma ES/EN

Spec: `specs/86-multilingual/spec.md`

Issue padre: #86

Estado: Approved

## Resumen técnico

Integrar primero la dependencia y el selector, luego migrar una página por PR y
cerrar con una matriz transversal. Cada página inglesa reutiliza la composición
española y define solo el copy, los vínculos y las excepciones de locale que no
puedan compartirse.

## Archivos afectados

| Ruta | Cambio | Motivo |
|---|---|---|
| `docs/MULTILINGUAL.md` | Actualizar estado reproducible | Operación y rollback |
| `parts/header.html` | Integración por definir en #87 | Selector ES/EN |
| `inc/` | Puente mínimo solo si la API pública lo exige | Carga y editor |
| `templates/` | Templates ingleses o ensamblaje compatible | Composición por locale |
| `patterns/` | Variantes inglesas trazables | Copy editable y versionado |
| `config/contact-form-7/` | Formulario inglés | Configuración idempotente |
| `bin/` | Aprovisionamiento inglés | Reproducibilidad local |
| `docs/qa/evidence/multilingual/` | Evidencia final | Gate integral |

Las rutas exactas se aprueban dentro de cada issue. Esta tabla no autoriza PHP,
CSS o duplicación antes de demostrar su necesidad.

## Bloques, APIs y tokens

- Bloques core: Group, Navigation, Heading, Paragraph, Image, Buttons,
  Shortcode y los ya usados por cada página.
- Bloques del plugin: selector de idioma o selector de navegación de Polylang,
  sujeto a validación en #87.
- Presets/tokens: reutilizar `theme.json`; un token nuevo necesita recurrencia y
  justificación conforme a `docs/DESIGN_SYSTEM.md`.
- APIs WordPress: locale, templates, patterns, enqueue y las APIs públicas de
  Polylang/CF7 estrictamente necesarias.
- Assets: locales, con procedencia; ningún hotlink.

## Flujo de implementación

1. #87 instala Polylang, define idiomas/URLs, calibra el selector y documenta
   estado persistente.
2. #88 migra Home EN como calibración completa de copy, wrapping, navegación y
   template inglés.
3. #89 aplica el contrato calibrado a Servicios EN y valida su mayor inventario.
4. #90 migra Contacto EN y provisiona un formulario independiente.
5. #91 ejecuta matriz transversal y regresión española, consolida evidencia y
   cierra #86.

Cada issue termina en PR, checks verdes, squash merge y `main` limpio antes de
iniciar el siguiente.

## Alternativas consideradas

| Alternativa | Ventajas | Costes | Decisión |
|---|---|---|---|
| Routing propio en templates | Sin plugin | Estado y mantenimiento en el theme | Rechazada por ADR 0002 |
| Polylang Pro desde el inicio | FSE traducible y sincronización | Licencia sin requisito actual | Diferida |
| Un PR para todas las páginas | Menos ceremonias | Review grande, deriva y rollback difícil | Rechazada |
| PR secuencial por resultado | Contexto acotado y evidencia clara | Más PRs | Aprobada |

## Compatibilidad y migración

No se cambia la compatibilidad declarada. La base de datos local guarda idiomas
y relaciones; todo estado que no viva en Git necesita procedimiento
reproducible. Producción no se migra en este plan.

## Accesibilidad

El selector anuncia propósito, idioma actual y destino; funciona con teclado y
navegación responsive. Cada documento declara su idioma y conserva headings,
landmarks, foco, contraste y reflow.

## Rendimiento

Medir el coste de Polylang y evitar cargar CSS/JS de CF7 o Turnstile fuera de
Contacto. Reutilizar assets y prioridades LCP existentes por página.

## Seguridad y privacidad

No se versionan credenciales ni datos. El theme no acepta parámetros de routing
propios. Formularios conservan la validación de CF7, Turnstile nativo y
`do_not_store`.

## Estrategia QA

| Criterio | Prueba | Evidencia |
|---|---|---|
| AC-01 | Matriz de idiomas, URLs, selector y editor | PR #87 |
| AC-02 | Paridad Home EN y regresión ES | PR #88 |
| AC-03 | Inventario y paridad Servicios EN | PR #89 |
| AC-04 | Formulario, entrega y no persistencia | PR #90 |
| AC-05 | Matriz integral responsive/a11y/performance | PR #91 |
| AC-06 | Consistency check de docs y handoff | PR #91 |

## Rollback

Cada página se puede revertir por su squash commit. Para infraestructura se
retira el selector y se desactiva Polylang sin borrar contenido. No se ejecutan
operaciones destructivas sobre páginas o relaciones sin aprobación explícita.

## ADR requerido

Sí: `docs/adr/0002-polylang-free-para-es-en.md` aceptado.
