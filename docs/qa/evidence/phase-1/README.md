# Evidencia QA visual: portada de Fase 1

Issue: #12<br>
Commit base probado: `ab47ba0`<br>
Fecha: 2026-07-25<br>
Responsable: @mariovicunadev

## Entorno

- Referencia de solo lectura: `https://vicunav.com/`
- Implementación local: `https://vicunav-gutenberg.local/`
- Navegador: navegador integrado del agente, Chromium, sesión anónima
- Sistema operativo: macOS
- Viewport: 1440×900 CSS px
- Zoom: 100 %
- Cache y throttling: valores predeterminados, sin throttling
- Estado: páginas recargadas y comparadas con el mismo ancho, alto y posiciones equivalentes

## Pares de captura

Las capturas cubren el header, los diez patterns y el footer. El desplazamiento se expresa desde el inicio del documento; producción aplica desplazamiento suave y puede terminar hasta cuatro píxeles después del objetivo.

| Cobertura | Scroll objetivo | LocalWP | Producción |
|---|---:|---|---|
| Header, hero y situaciones | 0 px | [local-01-top.webp](local-01-top.webp) | [produccion-01-top.webp](produccion-01-top.webp) |
| Situaciones e introducción | 1200 px | [local-02-ayuda.webp](local-02-ayuda.webp) | [produccion-02-ayuda.webp](produccion-02-ayuda.webp) |
| Proceso y testimonio | 2700 px | [local-03-proceso-testimonio.webp](local-03-proceso-testimonio.webp) | [produccion-03-proceso-testimonio.webp](produccion-03-proceso-testimonio.webp) |
| Testimonio y resultados | 4200 px | [local-04-resultados.webp](local-04-resultados.webp) | [produccion-04-resultados.webp](produccion-04-resultados.webp) |
| Debería sentirse, Mario y marcas | 5500 px | [local-05-mario-marcas.webp](local-05-mario-marcas.webp) | [produccion-05-mario-marcas.webp](produccion-05-mario-marcas.webp) |
| Marcas, CTA final y footer | 6700 px | [local-06-cta-footer.webp](local-06-cta-footer.webp) | [produccion-06-cta-footer.webp](produccion-06-cta-footer.webp) |

Cada archivo mide 1440×900 px. Los SHA-256 permiten comprobar que la evidencia no cambió después de la revisión:

| Archivo | SHA-256 |
|---|---|
| `local-01-top.webp` | `85e410dc2052194311c99df2bd2b475533380c8daf84e0b59b5bf443018ac65d` |
| `local-02-ayuda.webp` | `dc49abf33e6390db2481ba296c07b1df05f3be5730025e75b545e812154862e1` |
| `local-03-proceso-testimonio.webp` | `bd32c5d1ba309b7e788d58ac470eccb022c2b5036112e602c59281e04d422e91` |
| `local-04-resultados.webp` | `de7ed0a28aeb850f7a36d5259a3cbd3a0b2452519259a32049e57789d41421de` |
| `local-05-mario-marcas.webp` | `550c5e53c001f857de267417ce1e6b3b4b6a0e1ed0e0ef62ac53f4380b8420d1` |
| `local-06-cta-footer.webp` | `ccc7b19b96280de8439918d9cc74665fb6750104532d4f992ebfae541899ca59` |
| `produccion-01-top.webp` | `505bb7188aa82746ab308b1c58de6da08e4372ae16ea26c567fb2fb650c37c74` |
| `produccion-02-ayuda.webp` | `57a7ddf2cd03a91a2d11c5dbae5aabab3e9be435c0c67c1e1af8de02d312a9d0` |
| `produccion-03-proceso-testimonio.webp` | `1ce322e7b307d2b96c31e865eec8a0f55a57a78af5bc98b97d69ce82b915cc3d` |
| `produccion-04-resultados.webp` | `e80584976abeb56cfe735f49a11c38b7b7af3ca7823c349d4f36ea185bb450b2` |
| `produccion-05-mario-marcas.webp` | `afcf1224ab663f85656a4030df3704540ffede98c19c69435da5d36ccd308ef7` |
| `produccion-06-cta-footer.webp` | `61bfea362b78b6f503683a90745dbe7439048ae92505099436e001636542038f` |

## Comparación geométrica

Las alturas se midieron sobre el DOM renderizado con el mismo viewport. Los valores son píxeles CSS y conservan el redondeo subpíxel del navegador.

| Área | Producción | LocalWP | Delta local |
|---|---:|---:|---:|
| Header | 80,00 | 78,59 | −1,41 |
| Hero | 592,70 | 593,01 | +0,31 |
| Situaciones | 709,63 | 720,00 | +10,38 |
| Cómo ayudamos: introducción | 723,42 | 723,39 | −0,03 |
| Cómo ayudamos: proceso | 894,17 | 894,17 | 0,00 |
| Testimonio | 1377,71 | 1377,70 | −0,01 |
| Resultados | 787,45 | 787,50 | +0,05 |
| Debería sentirse | 401,01 | 400,98 | −0,02 |
| Conoce a Mario | 912,94 | 913,00 | +0,06 |
| Marcas | 304,74 | 304,74 | 0,00 |
| CTA final | 648,80 | 648,80 | 0,00 |
| Footer | 1097,97 | 1090,80 | −7,17 |
| Documento completo | 8530,00 | 8532,00 | +2,00 |

El mayor delta de sección es 10,38 px en Situaciones, equivalente a aproximadamente 1,46 % de su altura. El documento completo difiere dos píxeles. No se detectaron saltos de línea, desalineaciones, overflow ni pérdidas de contenido causadas por estas tolerancias.

## Hallazgos y decisiones

| Área | Hallazgo | Decisión |
|---|---|---|
| Copy, orden y medios | Los diez patterns conservan el inventario, el orden y los assets observados. | Pass. |
| Tipografía, color y espaciado | La comparación visual y geométrica coincide dentro de tolerancias de rasterización. | Pass. |
| Animaciones de entrada | Elementor deja contenido temporalmente atenuado durante algunas capturas de producción. | No se replica: `AGENTS.md` excluye animaciones y el contenido local aparece completo de inmediato. |
| H1 | La referencia usa una jerarquía de Elementor que no corresponde al inventario contractual. | El theme conserva un único H1 correcto en el hero; es una mejora semántica exigida por el proyecto. |
| Testimonio | Producción reproduce un MP4 de 112.225.142 bytes; el theme usa su poster visual. | Decisión resuelta en [la evidencia de #15](performance/README.md): Fase 1 conserva el poster; cualquier video futuro requiere spec y presupuesto propios. |
| Responsive y motores | Esta evidencia formaliza Chromium desktop. | La matriz de 390×844, 768×1024, Chrome, Firefox y Safari pertenece a #13. |

## Veredicto

**Pass para #12.** Header, diez secciones y footer fueron comparados sin diferencias silenciosas de contenido, orden o lenguaje visual. Las tres diferencias deliberadas están justificadas por el contrato de Fase 1 o enlazadas a un issue con owner.
