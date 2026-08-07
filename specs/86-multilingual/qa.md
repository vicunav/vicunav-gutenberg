# Evidencia QA: experiencia multidioma ES/EN

Issues: #86 y #91

Commit probado: rama `codex/91-qa-multilingual`; CI confirma el head del PR

Fecha: 2026-08-06

Responsable: @mariovicunadev

## Entorno

- URL: `https://vicunav-gutenberg.local/`
- WordPress: 7.0.2.
- PHP: LocalWP 8.2.29; CI 8.0 y 8.2.
- Navegador/SO: Chrome 151 y navegador integrado sobre macOS.
- Usuario: anónimo para frontend y administrador para Site Editor.
- Cache/throttling: Lighthouse móvil, cache fría, tres corridas por ruta.

## Resultados automatizados

| Check | Comando/workflow | Resultado | Evidencia |
|---|---|---|---|
| JSON y estructura | `composer qa` | Pass | `docs/qa/evidence/multilingual/91-integral.md` |
| Compatibilidad | GitHub Actions PHP 8.0/8.2 | Pass tras merge | PR #91 |
| Dependencias | `composer audit` | Pass | Sin advisories |
| Whitespace | `git diff --check` | Pass | Rama de #91 |
| Security | gates de `docs/QA.md` | Pass | Theme Check y revisión del diff |

## Criterios de aceptación

| Criterio | Estado | Evidencia |
|---|---|---|
| AC-01 infraestructura y selector | Pass | `docs/qa/evidence/multilingual/87-infrastructure.md` |
| AC-02 Home EN | Pass | `docs/qa/evidence/multilingual/88-home-en.md` |
| AC-03 Servicios EN | Pass | `docs/qa/evidence/multilingual/89-servicios-en.md` |
| AC-04 Contacto EN | Pass | `docs/qa/evidence/multilingual/90-contacto-en.md` |
| AC-05 QA integral | Pass | `docs/qa/evidence/multilingual/91-integral.md` |
| AC-06 documentación y handoff | Pass | `docs/MULTILINGUAL.md`, `docs/HANDOFF.md` |

## Matriz multidioma

| Superficie | Español | Inglés | Relación/selector | Estado |
|---|---|---|---|---|
| Home | `/` | `/en/home/` | Relación bidireccional | Pass |
| Servicios | `/servicios/` | `/en/website-design-for-therapists-and-wellness-practices/` | Relación bidireccional | Pass |
| Contacto | `/contacto/` | `/en/contact/` | Relación bidireccional | Pass |
| Portafolio | `/portafolio/` | Fuera de alcance | Selector oculta English | Pass |

Por cada ruta comprobar código HTTP, canonical, `html[lang]`, locale de
WordPress, navegación interna, traducción equivalente, header, footer y ausencia
de título administrativo.

## Visual responsive

| Viewport | Navegador | Referencia | Resultado/diff |
|---|---|---|---|
| 320×800 | Chrome | Página española aprobada | Pass, sin overflow |
| 390×844 | Chrome | Página española aprobada | Pass, sin overflow |
| 768×1024 | Chrome | Página española aprobada | Pass, sin overflow |
| 1440×900 | Chrome | Página española aprobada | Pass, sin overflow |

La traducción puede cambiar wrapping y altura editorial. Se conserva jerarquía,
ritmo y composición; cualquier diferencia sobre el umbral de `docs/QA.md` se
justifica por sección.

## Accesibilidad manual

- [x] Selector y navegación completos por teclado.
- [x] Foco visible y orden lógico en ambos idiomas.
- [x] Headings, landmarks y un solo `h1` por página.
- [x] `lang`, nombres de idioma y estado actual anunciados correctamente.
- [x] Zoom/reflow a 320 px sin scroll horizontal.
- [x] Contraste, alt text y lector de pantalla smoke.

## Formularios

- [x] Formularios ES/EN usan configuraciones y locales independientes.
- [x] Validación y mensajes corresponden al idioma activo.
- [x] Turnstile acepta claves oficiales de prueba en entorno local.
- [x] Mailpit recibe ambas entregas.
- [x] No existen entradas persistidas en WordPress.
- [x] Assets de CF7/Turnstile no cargan fuera de Contacto.

## Rendimiento

| Métrica | Baseline | Resultado | Delta | Budget |
|---|---:|---:|---:|---:|
| LCP | Española equivalente | 2.626–3.105 s | Sin regresión significativa por locale | Objetivo de campo ≤ 2.5 s |
| CLS | Española equivalente | 0,0022–0,0981 | ≤ 0,0019 entre locales equivalentes | ≤ 0.1 |
| TBT laboratorio | Española equivalente | 4–175 ms | Sin regresión significativa | Registrado |

## Riesgos residuales y limitaciones

Portafolio inglés y despliegue a producción están explícitamente fuera de
alcance. La matriz final no se repitió en Firefox y Safari; se cubrió Chrome,
navegador integrado, HTML nativo y la regresión cross-browser previa.

## Veredicto

Pass. Evidencia consolidada en
`docs/qa/evidence/multilingual/91-integral.md`.
