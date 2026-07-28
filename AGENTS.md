# AGENTS.md — Vicunav Gutenberg

## Propósito

Este repositorio contiene el block theme nativo de Gutenberg que migra
`vicunav.com` desde Elementor. Debe ser públicamente revisable, mantenible desde
Full Site Editing y equivalente a la referencia aprobada sin decisiones de
diseño silenciosas.

Producción es una referencia de solo lectura. El desarrollo y las pruebas
ocurren en LocalWP mediante el symlink documentado en `README.md`.

## Contexto mínimo

Antes de editar:

1. leer el issue activo y sus criterios;
2. leer el spec, plan, tarea, QA y `migration-brief.md` de la página;
3. abrir solo los archivos afectados y sus dependencias directas;
4. aplicar `docs/CONTEXT_EFFICIENCY.md`;
5. para migraciones visuales, aplicar `docs/MIGRATION_PLAYBOOK.md`.

Los inventarios de contenido viven en `specs/<issue>-<slug>/`; no reconstruir
copy desde memoria ni cargar inventarios de otras páginas.

## Convenciones no negociables

1. `theme.json` es la fuente de verdad para colores, familias tipográficas y
   decisiones visuales reutilizables. Seguir `docs/DESIGN_SYSTEM.md`.
2. Preferir bloques core, patterns registrados y APIs públicas de WordPress.
   Un bloque custom, dependencia o JavaScript propio necesita un spec que
   demuestre su necesidad.
3. Cada sección vive normalmente en `patterns/*.php`; los templates ensamblan
   patterns y `parts/header.html` / `parts/footer.html` sin duplicar markup.
4. El copy, orden, jerarquía y assets siguen el inventario aprobado de la
   página. No parafrasear ni rediseñar durante una migración 1:1.
5. Todos los assets se sirven localmente, con procedencia documentada. No usar
   hotlinks ni Google Fonts.
6. Evitar wrappers sin responsabilidad y `core/html` cuando un bloque core
   resuelva el caso. Un wrapper mínimo es válido para layout, accesibilidad,
   locking o edición.
7. No reintroducir animaciones o efectos de Elementor salvo que un spec
   posterior los incluya con accesibilidad y rendimiento verificados.
8. Toda documentación y comentario de código se escribe en español; los
   identificadores conservan las convenciones técnicas existentes.
9. No modificar producción, copiar datos privados ni imprimir contraseñas,
   salts, tokens o claves.

## Editor y compatibilidad

- Frontend y Site Editor son superficies obligatorias del producto.
- Los templates canónicos no muestran el título administrativo de la página ni
  dependen de overrides accidentales guardados en la base de datos.
- Compatibilidad declarada: WordPress 6.7+ y PHP 8.0+.
- Al cargar `wp-load.php` desde LocalWP, aplicar las reglas globales de socket
  MySQL antes de atribuir un error de conexión al theme.

## Git y verificación

- Todo cambio comienza en un issue y una rama trazable; no mezclar deuda ajena.
- Mantener commits coherentes por sección o resultado verificable.
- Antes de PR: `composer qa`, `composer audit` y `git diff --check`.
- Aplicar además los gates de `docs/QA.md`: frontend, editor, responsive,
  accesibilidad, rendimiento, seguridad y evidencia visual según el alcance.
- Una página no está terminada hasta aprobar integridad estructural y fidelidad
  visual contra un baseline estable.

## Fuentes de autoridad

Cuando exista conflicto: estas instrucciones → `docs/CONSTITUTION.md` → spec
aprobado → ADR aceptado → guías de `docs/` → implementación actual. Consultar
el mapa completo en `docs/README.md` y el workflow en `CONTRIBUTING.md`.
