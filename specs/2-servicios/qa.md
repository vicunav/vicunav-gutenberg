# QA: página de Servicios

Epic: #50
Estado: aprobado localmente; pendiente de review del pull request
Última actualización: 2026-07-27

## Entorno

| Campo | Valor |
|---|---|
| Local | `https://vicunav-gutenberg.local/servicios/` |
| Referencia de solo lectura | `https://vicunav.com/servicios/` |
| Theme | `vicunav`, activo mediante symlink al repositorio |
| Viewports | 320×800, 390×844, 768×1024 y 1440×900 |
| Navegadores finales | Chrome, Firefox y Safari disponibles |

Los comandos que carguen WordPress usan el runtime y socket de LocalWP conforme a `AGENTS.md`. Cualquier error HTML de conexión a base de datos es fallo aunque PHP termine con código cero.

## Baseline #51

| Control | Referencia observada | Estado |
|---|---|---|
| Orden | Nueve secciones entre header y footer | Pass |
| Copy | Hero, dos paquetes, ocho beneficios, cinco pasos, mantenimiento, tres extras, 17 FAQ y CTA | Pass |
| Desktop | Ancho útil 1425 px; header ≈80 px; contenido sin overflow | Pass |
| Móvil | Ancho útil 375 px en viewport nominal 390; flujo en una columna y sin overflow | Pass |
| Paleta | Neutrales y marrones ya presentes en `theme.json` | Pass |
| Fuentes | Red Hat Display, Bodoni Moda y Caveat ya self-hosted | Pass |
| Assets | Recursos descargados localmente, convertidos a WebP y documentados | Pass |

Evidencia: [`docs/qa/evidence/services/baseline/`](../../docs/qa/evidence/services/baseline/).

## Matriz de aceptación

| Criterio | Issue | Prueba | Estado |
|---|---:|---|---|
| AC-01 | #51 | Inventario, capturas, fuentes y checksums | Pass |
| AC-02 | #52 | Hero, LCP, CTA y responsive | Pass |
| AC-03 | #53 | Paquete Esencial y copy | Pass |
| AC-04 | #54 | Paquete Completo y copy | Pass |
| AC-05 | #55 | Ocho beneficios | Pass |
| AC-06 | #56 | Cinco pasos | Pass |
| AC-07 | #57 | Plan y ocho prestaciones | Pass |
| AC-08 | #58 | Tres opciones adicionales | Pass |
| AC-09 | #59 | 17 Details y teclado | Pass |
| AC-10 | #60 | CTA, template, ruta y editor | Pass |
| AC-11 | #61 | Paridad visual y responsive | Pass |
| AC-12 | #61 | QA automatizado, enlaces, consola y assets | Pass |

## Gate final

- `composer qa`.
- JSON y sintaxis de templates/patterns válidos.
- HTTP 200, un `h1`, ancla `#packages`, CTA correctos y cero hotlinks.
- Sin errores de consola atribuibles al theme.
- Sin overflow horizontal ni pérdida de contenido a 320 px.
- Navegación por teclado y foco visible en botones, menú y FAQ.
- Comparación visual sección por sección con diferencias justificadas.
- Presupuesto de assets y estrategia de carga documentados.

## Resultado final #61

| Gate | Resultado |
|---|---|
| `composer qa` | Pass: 23 archivos PHP, WPCS y validación estructural |
| Render WordPress | Pass: HTTP 200, un H1, nueve secciones y 17 Details |
| Pattern registry | Pass: nueve slugs `vicunav/servicios-*` |
| Editor del sitio | Pass: redirección a `page-servicios`, sin “Añadir título” |
| Assets | Pass: cero fallos, hotlinks o construcciones peligrosas |
| Responsive | Pass: cero overflow a 320, 390, 768 y 1440 px |
| Accesibilidad | Pass: Lighthouse 100; FAQ funcional con Enter |
| Rendimiento | Pass local: mediana 89; mejor corrida 93; cero JS propio |
| Best Practices | Pass: Lighthouse 100 |

Evidencia reproducible: [`docs/qa/evidence/services/regression/`](../../docs/qa/evidence/services/regression/).
