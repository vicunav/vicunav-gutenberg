# Tareas: experiencia multidioma ES/EN

Spec: `specs/86-multilingual/spec.md`

Plan: `specs/86-multilingual/plan.md`

## Reglas

- El estado real vive en GitHub.
- Cada tarea se completa de punta a punta antes de iniciar la siguiente.
- Las dependencias se respetan aunque GitHub no las represente nativamente.
- Cada PR enlaza criterios, checks y evidencia de su issue.

## Descomposición

| ID | Issue | Resultado | Criterios | Dependencias | Evidencia |
|---|---:|---|---|---|---|
| T-01 | #87 | Polylang Free y selector ES/EN | AC-01 | #85 cerrado | PR y QA de infraestructura |
| T-02 | #88 | Home EN | AC-02 | #87 | Baseline, regresión y editor |
| T-03 | #89 | Servicios EN | AC-03 | #88 | Inventario, regresión y editor |
| T-04 | #90 | Contacto EN y CF7 | AC-04 | #89 | Mailpit, no persistencia y visual |
| T-05 | #91 | QA integral ES/EN | AC-05, AC-06 | #87–#90 | Matriz consolidada |

## Orden crítico

```text
#87 → #88 → #89 → #90 → #91
```

## Integración

Condiciones para cerrar #86:

- [ ] #87–#91 cerrados con squash commits en `main`.
- [ ] Consistency check entre spec, ADR, implementación y docs completado.
- [ ] `qa.md` cubre todos los criterios.
- [ ] Frontend y Site Editor aprobados en ambos idiomas.
- [ ] Documentación, changelog y handoff actualizados.
- [ ] `main` y LocalWP sincronizados sin cambios no versionados del theme.
