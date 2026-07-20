# Workflow de trabajo

## Modelo operativo

`main` siempre representa un estado revisado y potencialmente desplegable. No se trabaja directamente sobre `main` salvo una emergencia documentada.

```text
Backlog → Ready → In progress → Review → QA → Done
```

El estado vive en GitHub Projects; no se duplica con labels de estado.

## Tipos de issue

- **Feature spec:** resultado amplio que necesita spec y puede contener sub-issues.
- **Atomic task:** entrega implementable y verificable por un PR pequeño.
- **Bug:** comportamiento actual que contradice un contrato o expectativa reproducible.
- **ADR:** propuesta de decisión transversal o difícil de revertir.

## Taxonomía recomendada

Labels de tipo:

```text
type:feature  type:bug  type:task  type:docs  type:chore
```

Labels de área:

```text
area:theme-json  area:header  area:footer  area:patterns
area:templates   area:assets  area:qa      area:tooling
```

Labels de calidad o riesgo:

```text
a11y  performance  security  content  visual
risk:high  blocked  needs-decision
```

Prioridad: `P0` incidente/bloqueo, `P1` release, `P2` planificado, `P3` mejora. Los milestones representan fases o releases; no componentes.

## Flujo óptimo

### 1. Intake

Crear el issue con la plantilla adecuada. Triage valida duplicados, tipo, área, prioridad y si necesita spec. Las ideas vagas vuelven a clarificación.

### 2. Especificación

Para una feature, crear el directorio `specs/<issue>-<slug>/`. Aprobar `spec.md` antes del plan y el plan antes de crear tareas de implementación.

### 3. Descomposición

Crear sub-issues atómicos desde el issue padre. Usar dependencias nativas `blocked by`/`blocking`; reservar menciones textuales para contexto. Cada sub-issue referencia criterios del spec.

### 4. Ready

Aplicar la Definition of Ready de `CONTRIBUTING.md`. Asignar owner, milestone y prioridad. Solo entonces mover a `Ready`.

### 5. Desarrollo

- mover a `In progress`;
- crear rama con el número del issue;
- implementar dentro del alcance;
- actualizar spec/plan si cambia la intención;
- ejecutar los gates aplicables;
- hacer commits coherentes.

WIP recomendado: una tarea de implementación por persona o agente. Limitar WIP reduce divergencia y conflictos.

### 6. Pull request

Abrir draft temprano si facilita feedback, pero solicitar revisión solo con plantilla completa y checks locales pasados. Un PR cierra normalmente un issue atómico, no el issue padre.

### 7. Review y QA

El reviewer valida intención, arquitectura y riesgos. QA valida criterios y registra evidencia en el commit exacto del PR. El autor resuelve comentarios con nuevos commits; no reescribe evidencia ya revisada sin avisar.

### 8. Merge

Política recomendada al configurar GitHub:

- pull request obligatorio;
- al menos una aprobación;
- descartar aprobación si cambia el diff;
- conversaciones resueltas;
- checks requeridos exitosos;
- rama actualizada cuando el riesgo lo justifique;
- sin force-push ni borrado de `main`;
- squash merge para un issue atómico, conservando commits separados cuando documentan secciones exigidas por el proyecto.

Usar `Closes #N` en el PR para cerrar el issue al integrar. El issue padre se cierra solo cuando sus sub-issues y criterios globales están completos.

### 9. Post-merge

- borrar rama remota;
- actualizar Project y milestone;
- revisar staging si el cambio es visible;
- abrir issue separado para deuda descubierta, sin ampliar el PR cerrado;
- incluir el cambio en `CHANGELOG.md` si es notable.

## Checks requeridos previstos

Cuando se implemente CI, proteger `main` con:

```text
validate-theme-json
lint-markup-and-php
wordpress-render-smoke
accessibility
visual-regression
performance-budget
secret-and-dependency-scan
```

No se documenta un comando como disponible hasta que exista su configuración en el repositorio. La creación de CI debe ser una iniciativa SDD propia.

## Emergencias

Un hotfix P0 puede reducir ceremonia, nunca controles de seguridad ni rollback. Debe incluir issue, branch, revisión, prueba mínima y un follow-up en 24–48 horas para completar spec, evidencia y prevención.

Referencias: [GitHub Issues](https://docs.github.com/en/issues/tracking-your-work-with-issues), [sub-issues](https://docs.github.com/en/issues/tracking-your-work-with-issues/using-issues/adding-sub-issues), [issue dependencies](https://docs.github.com/en/issues/tracking-your-work-with-issues/using-issues/creating-issue-dependencies) y [protected branches](https://docs.github.com/en/repositories/configuring-branches-and-merges-in-your-repository/managing-protected-branches/about-protected-branches).
