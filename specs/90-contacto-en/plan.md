# Plan: Contacto en inglés

Spec: `spec.md`

## Implementación

1. Versionar inventario y brief antes del markup.
2. Añadir el copy de Contacto al catálogo `en_US`.
3. Crear la variante EN y `page-contact-en` reutilizando estructura y estilos.
4. Exportar `contact-en.json` y hacer que el sincronizador gestione ES y EN.
5. Aprovisionar la página y relación con Polylang.
6. Validar errores, Turnstile, envío, Mailpit y ausencia de persistencia.
7. Ejecutar QA visual, responsive, FSE, accesibilidad y rendimiento.

## Rollback

Revertir el squash commit retira archivos y aprovisionamiento. Las páginas y
formularios creados en LocalWP no se eliminan automáticamente.
