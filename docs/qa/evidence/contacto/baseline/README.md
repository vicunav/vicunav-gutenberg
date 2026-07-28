# Baseline: Contacto

Fecha: 2026-07-28<br>
Issue: #70<br>
Referencia: `https://vicunav.com/contacto/`

## Archivos

- `live-desktop-full.png`: página completa estabilizada en desktop.
- `live-desktop-top.png`: detalle superior y primera pantalla del formulario.
- `live-mobile-extended.png`: introducción y formulario completo en móvil.
- `live-mobile-top.png`: detalle superior y primeros controles a 390 px.
- `metrics.json`: geometría, campos y dependencia funcional.

El formulario se inspeccionó en modo anónimo y solo lectura. No se envió ningún
mensaje a producción. Los estados dinámicos de éxito/error quedan sujetos a la
decisión #72 porque Elementor no publica su copy en el DOM inicial.
