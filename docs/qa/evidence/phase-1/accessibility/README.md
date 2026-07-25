# Evidencia QA de accesibilidad WCAG 2.2 AA

Issue: #14<br>
Commit probado: `c23602f`<br>
Fecha: 2026-07-25<br>
Responsable: @mariovicunadev

## Entorno

- URL: `https://vicunav-gutenberg.local/`
- WordPress: 7.0.2
- PHP: 8.2.29
- Sistema operativo: macOS
- Scanner: axe-core 4.12.1
- Automatización: Playwright 1.57.0 con Chrome 150.0.7871.182
- Árbol accesible complementario: WebKit 26.0
- Viewports: 320×800, 390×844 y 1440×900
- Preferencias verificadas: movimiento reducido y colores forzados
- Idioma de WordPress local: `es_ES`; documento renderizado con `lang="es"`

## Hallazgos corregidos

| Hallazgo | Resultado inicial | Corrección | Resultado final |
|---|---|---|---|
| Idioma del documento | LocalWP usaba `lang="en-US"` porque `WPLANG` estaba vacío | Se instaló y activó `es_ES`; README documenta el requisito de entorno | `lang="es"` |
| Email del footer | `neutral-600` sobre `neutral-100`: 2,93:1 | El enlace consume el token existente `neutral-800` | 10,97:1 |
| Nombres de navegación | Labels automáticos vacíos o ` 2`/` 3` | `Navegación principal`, `Explorar` y `Servicios` explícitos | Tres landmarks con nombres útiles y únicos |
| Indicador de foco | Foco nativo azul: 2,32:1 sobre la franja legal | Indicador bicolor con tokens `primary` y `neutral-100` | Al menos una capa supera 3:1 en superficies claras y oscuras |
| Foco en menú móvil | El outline quedaba parcialmente fuera del viewport | Contenido y cierre usan `site-gutter` | Outline completo y botón de cierre dentro del viewport |

El idioma es configuración de WordPress, no responsabilidad del theme. No se añadió un filtro que fuerce `language_attributes`; el entorno local quedó configurado correctamente y el procedimiento está documentado.

## Scanner automatizado

axe-core se ejecutó con las etiquetas `wcag2a`, `wcag2aa`, `wcag21a`, `wcag21aa` y `wcag22aa`:

| Estado | Violaciones | Revisiones manuales | Reglas aprobadas |
|---|---:|---:|---:|
| Desktop 1440×900 | 0 | 28 contrastes sobre imágenes/gradientes | 20 |
| Móvil 390×844, menú cerrado | 0 | 28 contrastes sobre imágenes/gradientes | 21 |
| Móvil 390×844, menú abierto | 0 | 28 contrastes sobre imágenes/gradientes | 24 |
| Reflow 320×800 | 0 | 28 contrastes sobre imágenes/gradientes | 21 |

El scan independiente con la etiqueta `best-practice` terminó con 17 reglas aprobadas, cero violaciones y cero resultados incompletos.

### Contrastes que axe no pudo calcular

Los 28 resultados incompletos provienen de fondos con imagen, gradiente, overlay o solapamiento. Se ocultó temporalmente cada texto, se capturó el fondo real bajo su caja y se calculó contraste por píxel. Se usa 4,5:1 como umbral conservador incluso en texto grande.

| Grupo | Contraste mínimo |
|---|---:|
| Hero — eyebrow | 9,19:1 |
| Hero — H1 | 9,78:1 |
| Hero — descripción | 10,08:1 |
| Situaciones — H2 | 10,32:1 |
| Situaciones — lista | 20,57:1 |
| Proceso — números | 15,58:1 |
| Testimonio — eyebrow | 13,86:1 |
| Testimonio — cita | 18,33:1 |
| Testimonio — atribución | 15,58:1 |
| CTA final — H2 | 9,97:1 |
| CTA final — texto | 13,12:1 |

## Revisión manual

| Control | Resultado |
|---|---|
| Skip link | Primer control: “Saltar al contenido”, 179×50 px; lleva al `main` y el siguiente `Tab` continúa en “Ver servicios”. |
| Teclado desktop | 21 controles reales en orden lógico; todos muestran foco y ninguno queda oculto. |
| Menú móvil | Abre con teclado, mueve el foco dentro, cicla entre cierre y cuatro enlaces, acepta `Shift+Tab`, cierra con `Escape` y devuelve foco. |
| Headings | Un H1, nueve H2 y once H3 sin saltos de nivel. |
| Landmarks | Un banner, un main, un contentinfo y tres navegaciones con nombres únicos. |
| Imágenes | 20 imágenes: decorativas con alt vacío y contenido/logos con texto alternativo contextual; ningún nombre de archivo usado como alt. |
| Nombres accesibles | Logo enlazado “Vicunav”, menú “Abrir/Cerrar el menú”, CTAs y enlaces con nombres comprensibles. |
| Targets | CTAs ≥48 px; navegación ≥24 px. Email y legales son enlaces inline y aplican la excepción de texto en línea de WCAG 2.5.8. |
| Reflow y zoom | 320 CSS px, equivalente a 400 % sobre 1280 px, y 720 CSS px, equivalente a 200 % sobre 1440 px, sin overflow ni pérdida. |
| Texto al 200 % | Diez secciones y todos los controles permanecen disponibles; cero controles recortados. |
| Movimiento reducido | Media query activa; cero animaciones y cero transiciones computadas. |
| Colores forzados | Contenido completo, foco visible, cero overflow y controles sin recorte. |
| Árbol accesible WebKit | Banner, navegación, main, headings, listas, imágenes, links y contentinfo expuestos en orden lógico con nombres útiles. |

## Capturas

| Evidencia | Archivo | SHA-256 |
|---|---|---|
| Foco bicolor sobre footer oscuro | [foco-footer-1440x900.jpg](foco-footer-1440x900.jpg) | `da3d21820918f22a69ff0328941a46ee4677fc358eb074f5852714fc06a3f699` |
| Foco contenido en overlay móvil | [foco-menu-390x844.jpg](foco-menu-390x844.jpg) | `229f354c1addd4dd75dd208ab4b337e2d8a3e2e7cf108b78036f6f506ff74d48` |
| Reflow a 320 CSS px | [reflow-320x800.jpg](reflow-320x800.jpg) | `22066b0082a0e2523d1957a3f2e7a2d76023715462581cdcd7e17e862c6d2a92` |

## Veredicto

**Pass para #14.** Cero violaciones WCAG 2.2 A/AA permanecen abiertas. Los resultados que requerían juicio manual fueron medidos y documentados; no se depende únicamente del scanner.
