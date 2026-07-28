# Regresión final: Portafolio

Fecha: 2026-07-28<br>
Issue: #68

## Alcance

- paridad del contenido principal contra `https://vicunav.com/portafolio/`;
- reflow a 320, 390, 768 y desktop;
- ausencia de overflow horizontal;
- template canónico y acceso directo al Editor del sitio;
- estructura de bloques válida y sin título de entrada;
- consola, assets, enlaces externos y quality gates del repositorio.

## Archivos

- `local-desktop-top.png`: referencia visual local en desktop.
- `local-320-top.png`: referencia visual local a 320 px.
- `site-editor.png`: template `page-portafolio` abierto en el Editor del sitio.
- `metrics.json`: medidas, contratos y resultado de los gates.

Las capturas son evidencia de regresión, no golden files automatizados. La
comparación excluye el header y footer compartidos cuando se mide la altura del
contenido principal.
