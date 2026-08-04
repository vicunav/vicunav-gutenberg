# Evidencia QA: experiencia multidioma ES/EN

Issue/PR: #86 / pendiente

Commit probado: pendiente

Fecha: pendiente

Responsable: pendiente

## Entorno

- URL: `https://vicunav-gutenberg.local/`
- WordPress: 7.0.2 al aprobar el spec; volver a registrar al ejecutar #91.
- PHP: LocalWP 8.2; CI 8.0 y 8.2.
- Navegador/SO: pendiente de matriz final.
- Usuario: anónimo para frontend y administrador para Site Editor.
- Cache/throttling: documentar con la evidencia.

## Resultados automatizados

| Check | Comando/workflow | Resultado | Evidencia |
|---|---|---|---|
| JSON y estructura | `composer qa` | Pending | PR #91 |
| Compatibilidad | GitHub Actions PHP 8.0/8.2 | Pending | PR #91 |
| Dependencias | `composer audit` | Pending | PR #91 |
| Whitespace | `git diff --check` | Pending | PR #91 |
| Security | gates de `docs/QA.md` | Pending | PR #91 |

## Criterios de aceptación

| Criterio | Estado | Evidencia |
|---|---|---|
| AC-01 infraestructura y selector | Pending | #87 |
| AC-02 Home EN | Pending | #88 |
| AC-03 Servicios EN | Pending | #89 |
| AC-04 Contacto EN | Pending | #90 |
| AC-05 QA integral | Pending | #91 |
| AC-06 documentación y handoff | Pending | #91 |

## Matriz multidioma

| Superficie | Español | Inglés | Relación/selector | Estado |
|---|---|---|---|---|
| Home | `/` | `/en/home/` | Pendiente | Pending |
| Servicios | `/servicios/` | `/en/website-design-for-therapists-and-wellness-practices/` | Pendiente | Pending |
| Contacto | `/contacto/` | `/en/contact/` | Pendiente | Pending |
| Portafolio | `/portafolio/` | Fuera de alcance | Estado sin traducción por definir en #87 | Pending |

Por cada ruta comprobar código HTTP, canonical, `html[lang]`, locale de
WordPress, navegación interna, traducción equivalente, header, footer y ausencia
de título administrativo.

## Visual responsive

| Viewport | Navegador | Referencia | Resultado/diff |
|---|---|---|---|
| 320×800 | Pendiente | Página española aprobada | Pending |
| 390×844 | Pendiente | Página española aprobada | Pending |
| 768×1024 | Pendiente | Página española aprobada | Pending |
| 1440×900 | Pendiente | Página española aprobada | Pending |

La traducción puede cambiar wrapping y altura editorial. Se conserva jerarquía,
ritmo y composición; cualquier diferencia sobre el umbral de `docs/QA.md` se
justifica por sección.

## Accesibilidad manual

- [ ] Selector y navegación completos por teclado.
- [ ] Foco visible y orden lógico en ambos idiomas.
- [ ] Headings, landmarks y un solo `h1` por página.
- [ ] `lang`, nombres de idioma y estado actual anunciados correctamente.
- [ ] Zoom/reflow a 320 px sin scroll horizontal.
- [ ] Contraste, alt text y lector de pantalla smoke.

## Formularios

- [ ] Formularios ES/EN usan configuraciones y locales independientes.
- [ ] Validación y mensajes corresponden al idioma activo.
- [ ] Turnstile acepta claves oficiales de prueba en entorno local.
- [ ] Mailpit recibe ambas entregas.
- [ ] No existen entradas persistidas en WordPress.
- [ ] Assets de CF7/Turnstile no cargan fuera de Contacto.

## Rendimiento

| Métrica | Baseline | Resultado | Delta | Budget |
|---|---:|---:|---:|---:|
| LCP | Por página | Pending | Pending | ≤ 2.5 s |
| CLS | Por página | Pending | Pending | ≤ 0.1 |
| TBT laboratorio | Por página | Pending | Pending | Registrar |

## Riesgos residuales y limitaciones

Pendiente de #91. Portafolio inglés y despliegue a producción están
explícitamente fuera de alcance.

## Veredicto

Pending
