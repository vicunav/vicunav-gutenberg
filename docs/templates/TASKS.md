# Tareas: <resultado>

Spec: `specs/<issue>-<slug>/spec.md`<br>
Plan: `specs/<issue>-<slug>/plan.md`

## Reglas

- Cada tarea se convierte en un sub-issue atómico.
- El estado real vive en GitHub.
- Las dependencias usan relaciones `blocked by`/`blocking`.
- Cada tarea enlaza criterios y evidencia.

## Descomposición

| ID | Issue | Resultado | Criterios | Dependencias | Evidencia |
|---|---:|---|---|---|---|
| T-01 | # | | AC-01 | — | |

## Orden crítico

```text
T-01 → T-02 → T-03
```

## Integración

Condiciones para cerrar el issue padre:

- [ ] Todos los sub-issues requeridos están cerrados.
- [ ] Consistency check completado.
- [ ] `qa.md` cubre todos los criterios.
- [ ] Documentación y changelog actualizados.
