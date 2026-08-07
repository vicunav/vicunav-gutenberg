# QA: Home en inglés

## Gates

- [x] `/en/home/` responde 200 con `html[lang="en-US"]`.
- [x] `/` conserva `html[lang="es-ES"]`, copy y estructura.
- [x] selector ES/EN llega a la traducción equivalente y anuncia estado actual.
- [x] header, footer y CTAs ingleses no cambian silenciosamente a español.
- [x] un H1, jerarquía y landmarks válidos, sin título administrativo.
- [x] sin bloques inválidos en frontend ni Editor del sitio.
- [x] 320×800, 390×844, 768×1024 y 1440×900 sin overflow ni solapes.
- [x] teclado, foco visible, menú móvil, contraste y reflow verificados.
- [x] budgets de `docs/PERFORMANCE.md` y assets locales conservados.
- [x] `composer qa`, `composer audit` y `git diff --check` pasan.

La evidencia ejecutada vive en `docs/qa/evidence/multilingual/88-home-en.md`.
