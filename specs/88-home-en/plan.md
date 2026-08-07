# Plan: Home en inglés

Spec: `spec.md`

## Implementación

1. Versionar el inventario inglés y el brief antes del markup.
2. Cargar el catálogo `en_US` del theme.
3. Registrar variantes EN que reutilicen los patterns españoles bajo locale
   inglés, sin duplicar estructura.
4. Crear `page-home`, `header-en` y `footer-en`.
5. Extender el aprovisionamiento de Polylang para crear y relacionar Home EN.
6. Validar estructura, frontend, FSE, responsive, accesibilidad y rendimiento.

## Reutilización

- tokens: `theme.json`, sin cambios;
- estructura: diez patterns existentes;
- assets: inventario local existente;
- estilos: CSS existente, sin excepciones inglesas;
- rutas y relaciones: APIs públicas de Polylang.

## Rollback

Revertir el squash commit elimina los archivos ingleses y el aprovisionamiento.
La página local creada por el script no se borra automáticamente.
