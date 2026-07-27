# QA: página de Servicios

Epic: #50  
Estado: baseline completo; implementación en curso  
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
| AC-02 | #52 | Hero, LCP, CTA y responsive | Pendiente |
| AC-03 | #53 | Paquete Esencial y copy | Pendiente |
| AC-04 | #54 | Paquete Completo y copy | Pendiente |
| AC-05 | #55 | Ocho beneficios | Pendiente |
| AC-06 | #56 | Cinco pasos | Pendiente |
| AC-07 | #57 | Plan y ocho prestaciones | Pendiente |
| AC-08 | #58 | Tres opciones adicionales | Pendiente |
| AC-09 | #59 | 17 Details y teclado | Pendiente |
| AC-10 | #60 | CTA, template, ruta y editor | Pendiente |
| AC-11 | #61 | Paridad visual y responsive | Pendiente |
| AC-12 | #61 | QA automatizado, enlaces, consola y assets | Pendiente |

## Gate final

- `composer qa`.
- JSON y sintaxis de templates/patterns válidos.
- HTTP 200, un `h1`, ancla `#packages`, CTA correctos y cero hotlinks.
- Sin errores de consola atribuibles al theme.
- Sin overflow horizontal ni pérdida de contenido a 320 px.
- Navegación por teclado y foco visible en botones, menú y FAQ.
- Comparación visual sección por sección con diferencias justificadas.
- Presupuesto de assets y estrategia de carga documentados.
