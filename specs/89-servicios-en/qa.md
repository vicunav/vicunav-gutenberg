# QA: Servicios en inglés

## Gates

- [x] La ruta EN responde 200 con `html[lang="en-US"]`.
- [x] `/servicios/` conserva `html[lang="es-ES"]`, copy y estructura.
- [x] El selector ES/EN llega a la traducción equivalente.
- [x] Paquetes, beneficios, proceso, mantenimiento, adicionales y 17 FAQ están.
- [x] Los CTA conservan el locale y no producen saltos silenciosos.
- [x] Un H1, jerarquía y landmarks válidos, sin título administrativo.
- [x] Sin bloques inválidos en frontend ni Editor del sitio.
- [x] 320×800, 390×844, 768×1024 y 1440×900 sin overflow ni solapes.
- [x] Teclado, foco, menú móvil, contraste y reflow verificados.
- [x] Budgets de `docs/PERFORMANCE.md` y assets locales conservados.
- [x] `composer qa`, `composer audit` y `git diff --check` pasan.

La evidencia ejecutada vivirá en
`docs/qa/evidence/multilingual/89-servicios-en.md`.
