# Changelog

Los cambios notables se documentan aquí. El proyecto usa [Semantic Versioning](https://semver.org/) a partir de su primera release estable.

## [Unreleased]

### Added

- Sandbox de escritura directa para Qwen limitado a scratch, evidencia generada
  y borradores documentales fuera del runtime del theme.
- Handoff neutral entre agentes, adaptador delgado para Claude Code y paquete
  SDD del lote multidioma #86–#91.
- ADR y runbook reproducible para la arquitectura ES/EN con Polylang Free,
  separación de responsabilidades y rollback.
- Página de Contacto nativa con template FSE, pattern editable y paridad
  responsive documentada.
- Configuración reproducible de Contact Form 7 `6.1.6`, integración nativa con
  Cloudflare Turnstile y runbook operativo sin secretos.
- Estados accesibles de validación y éxito, entrega verificada en Mailpit y
  defensa `do_not_store` sin Flamingo ni persistencia de entradas.
- Página de Portafolio nativa con template propio, dos patterns editables,
  cuatro proyectos y assets WebP locales.
- Evidencia responsive y contrato del Editor del sitio para Portafolio.
- Playbook de migración visual y brief compacto reutilizable para capturar
  baseline, paridad por sección y decisiones responsive sin repetir
  descubrimiento.
- Página de Servicios nativa con template propio y nueve patterns editables.
- Inventario literal, baseline y evidencia visual responsive para Servicios.
- Treinta y tres recursos locales optimizados para paquetes, beneficios, proceso, mantenimiento y FAQ.
- Diecisiete preguntas frecuentes con el bloque core Details y soporte de teclado sin JavaScript propio.

### Changed

- Los accesos de edición de Portafolio abren directamente
  `page-portafolio` en el Editor del sitio.
- Workflow, SDD, QA y plantillas de issues/PR separan integridad estructural de
  fidelidad visual e incorporan checkpoints tempranos de calibración.
- Los accesos de edición de Servicios abren directamente `page-servicios` en el Editor del sitio.
- La precarga LCP selecciona el hero correspondiente a la portada o a Servicios.

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
