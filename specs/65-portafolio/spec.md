# Spec: página de Portafolio

Issue padre: #65<br>
Estado: Approved<br>
Owner: @mariovicunadev<br>
Última actualización: 2026-07-27

## Problema

El Portafolio todavía depende de Elementor y no comparte la arquitectura,
editabilidad ni quality gates del block theme.

## Resultado esperado

`/portafolio/` reproduce la referencia de producción mediante bloques core,
patterns registrados, assets locales y un template FSE editable.

## Alcance

- introducción editorial;
- grid de cuatro proyectos;
- descripción, enlace y métricas PageSpeed por proyecto;
- composición 2×2 en escritorio y una columna en móvil;
- template, ruta local, integración del editor y QA.

## Fuera de alcance

- rediseñar contenido o proyectos;
- páginas individuales de caso de estudio;
- animaciones de entrada de Elementor;
- resolver la arquitectura multidioma;
- modificar header o footer compartidos.

## Requisitos

### Funcionales

- RF-01: `/portafolio/` responde `200`.
- RF-02: los cuatro enlaces de proyecto abren el destino declarado en una
  pestaña nueva con `rel="noopener"`.
- RF-03: el acceso administrativo de la página abre `page-portafolio` en el
  Editor del sitio.
- RF-04: el título administrativo no se renderiza ni aparece antes del diseño.

### Contenido y diseño

- RD-01: el copy coincide con `content-inventory.md`.
- RD-02: la página usa la superficie cálida texturizada de la referencia.
- RD-03: escritorio presenta dos columnas de `464 px` dentro de un grid de
  `960 px`, con `32 px` de gap.
- RD-04: móvil presenta una columna de `325 px` y conserva el orden.
- RD-05: cada tarjeta incluye imagen, título, descripción, enlace, divider,
  heading PageSpeed y cuatro métricas.
- RD-06: la presentación conserva wrapping, proporciones, sombras y ritmos
  registrados en `migration-brief.md`.

### No funcionales

- RNF-01 Accesibilidad: un solo H1, jerarquía continua, alt text informativo,
  foco visible y WCAG 2.2 AA en el alcance.
- RNF-02 Rendimiento: imágenes WebP locales de `916×1024`, lazy loading,
  dimensiones intrínsecas y cero JavaScript propio.
- RNF-03 Seguridad: no hay hotlinks; los enlaces externos usan `noopener`.
- RNF-04 Compatibilidad: WordPress 6.7+, PHP 8.0+ y bloques core.
- RNF-05 Editor: estructura protegida con contenido editable y cero bloques
  inválidos.

## Criterios de aceptación

- [ ] AC-01: baseline y brief cubren escritorio y móvil.
- [ ] AC-02: introducción equivalente a producción.
- [ ] AC-03: cuatro tarjetas completas y enlaces correctos.
- [ ] AC-04: grid, alturas, wrapping y encuadre equivalentes en desktop.
- [ ] AC-05: orden, ancho y ritmo equivalentes en móvil.
- [ ] AC-06: `page-portafolio.html` es la fuente canónica.
- [ ] AC-07: Site Editor y frontend conservan la misma intención.
- [ ] AC-08: reflow sin overflow entre `320 px` y desktop.
- [ ] AC-09: assets locales, accesibilidad y quality gates aprobados.

## Assets

La procedencia, optimización y checksums viven en
`assets/images/SOURCES.md`. Las cinco imágenes locales se almacenan bajo
`assets/images/portfolio/`.

## Riesgos y supuestos

- Las animaciones `fadeIn` alteran capturas intermedias; el baseline usa el
  estado final estabilizado.
- Los sitios de Clearpath y Eleanor son URLs de staging públicas presentes en
  la referencia. Se conservan literalmente hasta una decisión de contenido.
- El copy de la URL española está actualmente en inglés. Clonarlo literalmente
  es una decisión de fidelidad, no una traducción implícita.

## Decisiones

| Fecha | Decisión | Motivo |
|---|---|---|
| 2026-07-27 | Usar H1 para el título editorial aunque producción use H3 | Corrige semántica sin cambiar presentación |
| 2026-07-27 | Mantener el copy inglés observado en `/portafolio/` | Es la fuente de verdad publicada para esta URL |
| 2026-07-27 | Omitir `fadeIn` | Fuera del alcance de clon nativo definido por el proyecto |
