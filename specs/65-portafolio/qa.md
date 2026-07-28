# QA: página de Portafolio

Issue padre: #65<br>
Estado: aprobado<br>
Última actualización: 2026-07-28

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
- Consola y contratos de rendimiento reproducibles definidos en `docs/QA.md`.

## Ledger

| Sección | Contenido | Macro desktop | Móvil | Detalle | Editor | Estado |
|---|---|---|---|---|---|---|
| Introducción | Pass | Pass | Pass | Pass | Pass | Done |
| Proyectos | Pass | Pass | Pass | Pass | Pass | Done |

## Evidencia de #67

| Control | Producción | Local | Veredicto |
|---|---:|---:|---|
| Grid desktop | 960 px | 960 px | Pass |
| Card desktop | 464 px | 464 px | Pass |
| Imagen desktop | 462×517 px | 462×517 px | Pass |
| Alto de `main` desktop | 2365 px | 2363 px | Pass |
| Grid/card móvil | 327 px | 327 px | Pass |
| Imagen móvil | 325×364 px | 325×364 px | Pass |
| Alto de `main` móvil | 4110 px | 4107 px | Pass |
| Gaps móvil | 32 px | 32 px | Pass |
| Overflow horizontal | ninguno | ninguno | Pass |

La tolerancia máxima observada en ejes y alturas del contenido es `3 px`. La
diferencia de alto total restante pertenece al footer compartido y se excluye
de este issue conforme al spec.

## Integración y reflow

- `page-portafolio.html` ensambla header, dos patterns y footer sin
  `post-title` ni `post-content`.
- La página `portafolio` abre directamente ese template en el Editor del sitio.
- El Editor muestra los cuatro proyectos, no presenta bloques inválidos,
  cambios pendientes ni un campo de título.
- A 320 px, el contenido usa una columna de `257 px`; a 768 px conserva una
  columna de `327 px`.
- En 320, 390, 768 y desktop se cumple
  `documentElement.scrollWidth === documentElement.clientWidth`.
- La consola del frontend y del Editor no registró errores ni advertencias.

## Contratos finales

| Control | Resultado |
|---|---|
| HTTP | 200 |
| Jerarquía | 1 H1, 4 H2 y 4 H3 |
| Proyectos | 4 |
| Enlaces externos | 4 con `_blank` y `noopener` |
| Imágenes | 4 WebP locales, lazy, 916×1024 y alt informativo |
| JavaScript propio | ninguno |
| `composer qa` | Pass |
| `composer audit` | Pass |

Evidencia: `docs/qa/evidence/portfolio/regression/`.

## Riesgos residuales

Ninguno aceptado. Las URLs de staging se preservan como contenido de la
referencia y se pueden cambiar mediante un issue de contenido posterior.
