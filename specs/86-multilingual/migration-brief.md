# Brief de migración: experiencia ES/EN

Issue padre: #86

Spec: `specs/86-multilingual/spec.md`

Última actualización: 2026-08-03

> Este brief registra contratos compartidos. Cada página hija crea su propio
> inventario bilingüe y evidencia sin copiar el contexto de otras páginas.

## Identidad y estado

| Campo | Valor |
|---|---|
| Referencias de solo lectura | `vicunav.com`, rutas históricas EN aprobadas |
| Verdad de contenido | Inventarios españoles versionados |
| URL local | `https://vicunav-gutenberg.local/` |
| Templates | Definir por issue sin duplicar composición innecesaria |
| Estado estable de referencia | Página española aprobada, sin animaciones de entrada |
| Usuario de captura | Anónimo; administrador solo para Site Editor |
| Viewports | 320×800, 390×844, 768×1024, 1440×900 |

## Paquete de contexto

| Categoría | Rutas o contratos | Motivo |
|---|---|---|
| Requeridos | `AGENTS.md`, #86, `spec.md`, `plan.md`, `tasks.md`, `qa.md` | Autoridad y alcance |
| Arquitectura | ADR 0002, `docs/MULTILINGUAL.md` | Responsabilidades ES/EN |
| Diseño | `docs/DESIGN_SYSTEM.md`, `docs/MIGRATION_PLAYBOOK.md` | Reutilización y fidelidad |
| Dependencias directas | Spec e inventario español de la página activa | Verdad de copy y composición |
| Checks enfocados | Render de rutas/locale/selector y checks del issue | Feedback rápido |
| Excluidos | Binarios ajenos, `vendor/`, core WP y producción mutable | Contexto mínimo suficiente |

Ampliar el paquete solo ante las señales de `docs/CONTEXT_EFFICIENCY.md` y
registrar el motivo en el issue.

## Reutilización

| Elemento existente | Ruta/token | Decisión |
|---|---|---|
| Header | `parts/header.html` | Reutilizar; integrar selector una vez |
| Footer | `parts/footer.html` | Reutilizar y validar enlaces por locale |
| Tokens | `theme.json` | Reutilizar; no crear escala inglesa paralela |
| Patterns ES | `patterns/` | Reutilizar estructura; separar copy si WordPress lo requiere |
| Assets | `assets/` | Reutilizar salvo necesidad documentada |
| Contacto ES | ADR 0001, `config/contact-form-7/contacto-es.json` | Reutilizar contrato, no el formulario |

## Mapa del lote

| Orden | Página/sistema | Español | Inglés | Issue |
|---:|---|---|---|---:|
| 1 | Infraestructura y selector | Global | Global | #87 |
| 2 | Home | `/` | `/en/home/` | #88 |
| 3 | Servicios | `/servicios/` | `/en/website-design-for-therapists-and-wellness-practices/` | #89 |
| 4 | Contacto | `/contacto/` | `/en/contact/` | #90 |
| 5 | QA integral | Todas | Todas | #91 |

## Tokens y excepciones

- Superficies: reutilizar las aprobadas en español.
- Tipografía: misma escala; ajustar composición, no crear tamaños por idioma.
- Espaciados: mismos presets salvo diferencia estructural observada.
- CSS estructural local: wrapping, grid u orden solo cuando la traducción lo
  demuestre.
- Token nuevo: requiere recurrencia, nombre semántico y aprobación conforme al
  Design System.

## Responsive

- El copy inglés puede cambiar saltos y alto; comparar por sección.
- El selector debe funcionar dentro del overlay responsive existente.
- No asumir que un ajuste desktop resuelve reflow móvil.
- Conservar el estado visual final; movimiento queda fuera de alcance.

## Ledger de paridad

| Entrega | Contenido | Macro desktop | Móvil | Editor | Locale/URLs | Estado |
|---|---|---|---|---|---|---|
| #87 infraestructura | N/A | Pending | Pending | Pending | Pending | Ready |
| #88 Home EN | Pending | Pending | Pending | Pending | Pending | Blocked by #87 |
| #89 Servicios EN | Pending | Pending | Pending | Pending | Pending | Blocked by #88 |
| #90 Contacto EN | Pending | Pending | Pending | Pending | Pending | Blocked by #89 |
| #91 QA integral | Pending | Pending | Pending | Pending | Pending | Blocked by #87–#90 |

## Decisiones y preguntas

| Fecha | Hecho/decisión | Fuente |
|---|---|---|
| 2026-08-03 | Polylang Free `3.8.6` | ADR 0002 / #85 |
| 2026-08-03 | Español sin prefijo; inglés bajo `/en/` | ADR 0002 |
| 2026-08-03 | Inventarios españoles son verdad de contenido | Instrucción del proyecto / #86 |
| 2026-08-03 | Portafolio EN fuera del lote | #86 |

## Evidencia

- Baseline: crear por página hija desde su fuente española.
- Regresión: `docs/qa/evidence/multilingual/` y carpetas por página.
- Métricas: crear en #87 para infraestructura y consolidar en #91.
- PR: uno por #87–#91.
