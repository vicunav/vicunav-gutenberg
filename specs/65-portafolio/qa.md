# QA: página de Portafolio

Issue padre: #65<br>
Estado: baseline completado; implementación pendiente<br>
Última actualización: 2026-07-27

## Entorno

| Campo | Valor |
|---|---|
| Referencia | `https://vicunav.com/portafolio/` |
| Local | `https://vicunav-gutenberg.local/portafolio/` |
| Viewports | 320×800, 390×844, 768×1024, 1440×900 |
| Theme | `vicunav`, activo por symlink |

## Gates

- `composer qa`.
- `composer audit`.
- HTTP 200, un H1 y cuatro proyectos.
- Cero hotlinks, assets fallidos u overflow.
- Enlaces externos y foco.
- Site Editor sin bloques inválidos.
- Comparación sección por sección.
- Lighthouse y consola.

## Ledger

| Sección | Contenido | Macro desktop | Móvil | Detalle | Editor | Estado |
|---|---|---|---|---|---|---|
| Introducción | Pass baseline | Pending | Pending | Pending | Pending | In progress |
| Proyectos | Pass baseline | Pending | Pending | Pending | Pending | Blocked by #67 |

## Riesgos residuales

Ninguno aceptado. Las URLs de staging se preservan como contenido de la
referencia y se pueden cambiar mediante un issue de contenido posterior.
