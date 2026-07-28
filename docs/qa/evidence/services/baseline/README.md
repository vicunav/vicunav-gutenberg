# Baseline de Servicios

Referencia: `https://vicunav.com/servicios/`
Fecha: 2026-07-27
Issue: #51

Las capturas documentan la referencia de solo lectura antes de implementar la plantilla Gutenberg. Se registraron recorridos desktop de 1440×900 y móvil nominal de 390×844; Chrome expuso un ancho útil de 1425 px y 375 px respectivamente por la barra de desplazamiento.

## Medidas observadas

| Sección | Desktop | Móvil |
|---|---:|---:|
| Hero | 566 px | 848 px |
| Paquete Esencial | 921 px | 1884 px |
| Paquete Completo | 1003 px | 2157 px |
| Beneficios | 1097 px | 3382 px |
| Proceso | 1148 px | 2463 px |
| Mantenimiento | 732 px | 1269 px |
| Opciones adicionales | 626 px | 1224 px |
| FAQ | 1343 px | 2236 px |
| CTA final | 649 px | 524 px |

Las alturas son referencias de composición, no contratos pixel-perfect aislados. El criterio final compara encuadre, jerarquía, ritmo, wrapping, fondos y flujo completo. Las transiciones de entrada de Elementor no forman parte de la migración; se descartaron dos capturas móviles tomadas durante estados transparentes.

## Archivos

- `live-top-desktop.png` y `live-top-mobile.png`: primer viewport.
- `live-desktop-01.png` a `live-desktop-09.png`: recorrido completo desktop.
- `live-mobile-01.png` a `live-mobile-11.png`: recorrido móvil, sin los estados transitorios descartados.

El inventario literal está en `specs/2-servicios/content-inventory.md`; la procedencia y los checksums de medios están en `assets/images/SOURCES.md`.
