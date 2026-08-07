# QA: Contacto en inglés

## Gates

- [x] Ruta EN 200 con `html[lang="en-US"]`; ES conserva su locale.
- [x] Selector ES/EN enlaza la traducción equivalente.
- [x] Un H1, un formulario, ocho campos y cuatro requeridos.
- [x] Labels, opciones, placeholders, error y éxito están en inglés.
- [x] Turnstile presente una vez y assets ausentes fuera de Contacto.
- [x] Envío AJAX recibido en Mailpit con `Reply-To` correcto.
- [x] `do_not_store`, Flamingo ausente y cero posts o tablas de entradas.
- [x] 320×800, 390×844, 768×1024 y 1440×900 sin overflow.
- [x] Editor del sitio sin Post Title ni bloques inválidos.
- [x] Lighthouse Accessibility y budgets de rendimiento aprobados.
- [x] `composer qa`, `composer audit` y `git diff --check` pasan.

La evidencia vivirá en `docs/qa/evidence/multilingual/90-contacto-en.md`.
