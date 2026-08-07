# Plan: Servicios en inglés

Spec: `spec.md`

## Implementación

1. Versionar inventario y brief antes del markup.
2. Ampliar el catálogo `en_US` con todo el copy de Servicios.
3. Registrar nueve variantes EN reutilizando los patterns españoles.
4. Crear `page-services-en` con header y footer ingleses existentes.
5. Aprovisionar la página y su relación de Polylang de forma idempotente.
6. Resolver los CTA de Contacto según locale.
7. Validar estructura, frontend, FSE, responsive, accesibilidad y rendimiento.

## Reutilización

- tokens: `theme.json`, sin cambios;
- estructura y estilos: nueve patterns y CSS existentes;
- assets: inventario local de Servicios;
- navegación y relaciones: APIs públicas de Polylang.

## Rollback

Revertir el squash commit retira los archivos y el aprovisionamiento. La página
creada en LocalWP no se elimina automáticamente.
