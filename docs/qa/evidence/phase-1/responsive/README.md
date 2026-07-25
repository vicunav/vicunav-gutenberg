# Evidencia QA responsive y entre navegadores

Issue: #13<br>
Commit probado: `5a01490`<br>
Fecha: 2026-07-25<br>
Responsable: @mariovicunadev

## Entorno

- URL: `https://vicunav-gutenberg.local/`
- Sistema operativo: macOS
- Automatización: Playwright 1.57.0
- Chrome: 150.0.7871.182, binario estable instalado
- Firefox: 144.0.2, binario aislado de Playwright
- WebKit: 26.0, motor de compatibilidad con Safari
- Usuario: anónimo
- Cache y throttling: valores predeterminados, sin throttling
- Zoom: 100 % en la matriz base

Firefox se ejecutó con HTTP/2 desactivado en su perfil de prueba. El servidor de desarrollo de LocalWP mantenía abierto el evento de navegación con el binario aislado aunque el documento ya estuviera renderizado; HTTP/1.1 eliminó esa condición del entorno. Esta preferencia no modifica estilos, scripts, DOM ni comportamiento del theme.

## Matriz ejecutada

| Motor | 320×800 reflow | 360×800 | 390×844 | 720×900 reflow | 768×1024 | 844×390 horizontal | 1440×900 |
|---|---|---|---|---|---|---|---|
| Chrome 150 | Pass | Pass | Pass | Pass | Pass | Pass | Pass |
| Firefox 144 | Pass | Pass | Pass | Pass | Pass | Pass | Pass |
| WebKit 26 | Pass | Pass | Pass | Pass | Pass | Pass | Pass |

Los viewports de reflow representan el ancho CSS disponible después de zoom: 720 px equivale a 200 % sobre una ventana de 1440 px; 320 px equivale a 400 % sobre una ventana de 1280 px. En ambos casos todo el contenido permanece disponible en una sola dirección de desplazamiento.

## Assertions comunes

Los 21 recorridos terminaron con los mismos resultados:

| Control | Resultado |
|---|---|
| Respuesta | HTTP 200 |
| Overflow | `scrollWidth === clientWidth`; cero scroll horizontal |
| Contenido | Diez secciones presentes una sola vez |
| Jerarquía | Un H1 |
| Landmarks | Un `header`, un `main` y un `footer` |
| Medios | 20 imágenes presentes; cero fallidas |
| Controles | Cero enlaces o botones recortados horizontalmente |
| Tipografía | Bodoni Moda en H1 y Red Hat Display en cuerpo |
| Consola | Cero errores y cero excepciones de página |
| Navegación móvil | Botón visible; cuatro destinos; `Escape` cierra y devuelve el foco |
| Navegación ≥ 720 px | Cuatro destinos visibles |

Las alturas totales varían de forma esperada por rasterización tipográfica. En 1440×900 fueron 8533 px en Chrome, 8533 px en Firefox y 8512 px en WebKit; no producen pérdida de contenido ni cambios de orden.

## Capturas

Cada motor tiene tres capturas representativas:

- 360×800: menú móvil abierto y asentado durante 600 ms.
- 768×1024: composición responsive del proceso.
- 1440×900: footer completo al final del documento.

| Motor | Móvil | Tableta | Escritorio |
|---|---|---|---|
| Chrome | [chrome-360x800.jpg](chrome-360x800.jpg) | [chrome-768x1024.jpg](chrome-768x1024.jpg) | [chrome-1440x900.jpg](chrome-1440x900.jpg) |
| Firefox | [firefox-360x800.jpg](firefox-360x800.jpg) | [firefox-768x1024.jpg](firefox-768x1024.jpg) | [firefox-1440x900.jpg](firefox-1440x900.jpg) |
| WebKit | [webkit-360x800.jpg](webkit-360x800.jpg) | [webkit-768x1024.jpg](webkit-768x1024.jpg) | [webkit-1440x900.jpg](webkit-1440x900.jpg) |

| Archivo | SHA-256 |
|---|---|
| `chrome-360x800.jpg` | `c04dcc6aa022dec65e395fb18cd8ed09c0a1b2ad5be00c0ad11a863c79191c75` |
| `chrome-768x1024.jpg` | `63909403fae03cb824a2bc67e4605405aba8ebe83cea526a483c602365beca90` |
| `chrome-1440x900.jpg` | `39a6c59781cd741eda954075dbf68c0f50c627ece24a21df6b40571688e51d4d` |
| `firefox-360x800.jpg` | `1de245c7c3d29f4a345592072cb248b524143d5b046504a50ed303d6122efb3e` |
| `firefox-768x1024.jpg` | `c7997d8ccfb5285e4c85bb82211625e11f0b7829c8bd555dcdc04503c494fa3e` |
| `firefox-1440x900.jpg` | `a8e4066d26b082a49c21e19478039adbe71b6614d37c23a9e5329c73812d78c4` |
| `webkit-360x800.jpg` | `7b6dac1fce3fe7e437df76c9b21b35575d620cd36fc9eb6e0919406ad2e1331f` |
| `webkit-768x1024.jpg` | `c04e4ffcfdeb01e71fed7acfe80ec4b074bf8f06a1be2830d73e42844c8a9941` |
| `webkit-1440x900.jpg` | `5acd293fc056e5af0b904ed8fa04182bb64f02863d9e88be37d8ff4d7006a655` |

Las nueve capturas fueron revisadas visualmente después de esperar el estado de carga, las fuentes y el asentamiento de transiciones. Las diferencias subpíxel entre motores no cambian composición, lectura u operación.

## Veredicto

**Pass para #13.** La portada conserva contenido, jerarquía, navegación y lectura en móvil, tableta, orientación horizontal, escritorio y reflow, sin overflow, controles inoperables ni defectos específicos de motor.
