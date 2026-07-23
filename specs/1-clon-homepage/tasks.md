# Tareas: clon exacto del homepage en Gutenberg

Spec: `specs/1-clon-homepage/spec.md`<br>
Plan: `specs/1-clon-homepage/plan.md`

## Reglas

- El estado real vive en GitHub; este archivo describe el contrato y las dependencias.
- Cada issue entrega un resultado independiente y cierra mediante un PR trazable.
- Las relaciones `blocked by`/`blocking` ya están configuradas de forma nativa en GitHub.
- Cada PR registra commit, checks, entorno y evidencia proporcional al riesgo.
- No se inicia un pattern hasta aprobar y cerrar #2.

## Preparación

| Issue | Resultado | Condición de cierre |
|---:|---|---|
| #2 | Paquete SDD de Fase 1 | Spec y plan aprobados; tasks y matriz QA consistentes con #1. |

## Descomposición

| ID | Issue | Resultado | Criterios | Dependencias | Evidencia |
|---|---:|---|---|---|---|
| T-01 | #3 | Pattern hero registrado con asset local aprobado | AC-02 | #2 | Lint, render, copy y captura responsive |
| T-02 | #4 | Pattern situaciones con ocho puntos | AC-03 | #3 | Lint, render, semántica de lista y captura |
| T-03 | #5 | Pattern cómo ayudamos con seis pasos | AC-04 | #4 | Lint, render, copy y captura |
| T-04 | #6 | Pattern testimonio destacado | AC-05 | #5 | Lint, semántica de cita y captura |
| T-05 | #7 | Pattern resultados | AC-06 | #6 | Lint, render, copy y captura |
| T-06 | #8 | Pattern debería sentirse como tú | AC-07 | #7 | Lint, render, CTA y captura |
| T-07 | #9 | Pattern conoce a Mario | AC-08 | #8 | Lint, bio exacta, assets/alt y captura |
| T-08 | #10 | Pattern CTA final | AC-09 | #9 | Lint, teclado, destino y captura |
| T-09 | #11 | `front-page.html` ensamblado | AC-10 | #10 | Parse/render, HTTP 200, orden y Site Editor |
| T-10 | #12 | Paridad visual 1:1 documentada | AC-01, AC-11 | #11 | Capturas referencia/local y registro de diferencias |
| T-11 | #13 | Matriz responsive y navegadores aprobada | AC-12 | #12 | Viewports/navegadores y defectos resueltos |
| T-12 | #14 | Auditoría WCAG 2.2 AA aprobada | AC-13 | #12 | Scanner y controles manuales |
| T-13 | #15 | Assets y presupuesto de rendimiento aprobados | AC-14 | #12 | Pesos, fuentes WOFF2 y Lighthouse ×3 |
| T-14 | #16 | Release candidate preparado sin despliegue | AC-15, AC-16 | #13, #14, #15 | Theme Check, seguridad, changelog, versión y evidencia consolidada |
| T-15 | #19 | Header corregido contra la referencia vigente | AC-01 | #2; bloquea aprobación de #3 | Comparación desktop/móvil, render, teclado y captura |

## Orden crítico

```text
#2 → #19
       ↓
      #3 → #4 → #5 → #6 → #7 → #8 → #9 → #10 → #11 → #12
                                                    ├→ #13 ─┐
                                                    ├→ #14 ─┼→ #16 → cierre #1
                                                    └→ #15 ─┘
```

## Definition of Ready de cada pattern

- Issue anterior cerrado y dependencia desbloqueada.
- Criterios del spec identificados.
- Copy y referencia visual disponibles.
- Assets requeridos con procedencia o plan explícito de aprobación.
- Estrategia de prueba y viewport de comparación definidos.
- No existen preguntas materiales sin resolver.

## Integración

Condiciones para cerrar el issue padre #1:

- [ ] Todos los sub-issues #2–#16 están cerrados.
- [ ] Consistency check Constitución ↔ spec ↔ plan ↔ tasks ↔ diff ↔ evidencia completado.
- [ ] `qa.md` cubre AC-01–AC-16 sobre el commit candidato.
- [ ] No quedan violaciones bloqueantes de accesibilidad, seguridad o render.
- [ ] Diferencias visuales tienen corrección o limitación técnica aceptada y trazable.
- [ ] Documentación, versión y `CHANGELOG.md` están actualizados.
- [ ] Ningún paso ha modificado producción.
