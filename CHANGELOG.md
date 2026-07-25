# Changelog

Los cambios notables se documentan aquí. El proyecto usa [Semantic Versioning](https://semver.org/) a partir de su primera release estable.

## [Unreleased]

## [0.2.0] - 2026-07-25

### Added

- Sistema documental de arquitectura, SDD, workflow, QA, rendimiento, accesibilidad, seguridad y releases.
- Plantillas para specs, tareas, evidencia, issues y pull requests.
- Diez patterns registrados con bloques core y el template `front-page.html` que ensambla la portada completa.
- Assets locales con procedencia documentada para hero, secciones editoriales, proceso, testimonio, marcas y CTA.
- Redirección acotada de la edición de la portada hacia su template en el Editor del sitio.
- Evidencia versionada de paridad visual, responsive cross-browser, accesibilidad WCAG 2.2 AA y rendimiento.

### Changed

- Header y footer alineados con la referencia de producción y editables como template parts.
- Fuentes convertidas y subseteadas a WOFF2; transferencia inicial reducida de 940.749 a 238.137 bytes.
- Imágenes con dimensiones intrínsecas, prioridad LCP y carga diferida según posición.

### Fixed

- Foco visible, contraste, landmarks y navegación responsive auditados.
- Título de la página estática retirado de la experiencia de edición y del frontend.
- Gradientes, espaciado, tipografía y color normalizados mediante tokens del theme.

## [0.1.0] - 2026-07-20

### Added

- Tokens de color, tipografía y espaciado en `theme.json`.
- Fuentes self-hosted y sus licencias OFL.
- Cabecera nativa con navegación responsive.
- Pie de página completo con bloques core.
- Template `index.html` mínimo para activar el block theme.
- Integración local mediante symlink con LocalWP.
