# Spec-Driven Development

## Enfoque

Este proyecto adopta el flujo moderno de GitHub Spec Kit —`Spec → Plan → Tasks → Implement`— sin convertir la herramienta en dependencia obligatoria. Los artefactos Markdown son durables, versionados y revisables por personas o agentes.

El propósito es preservar la intención. Un cambio se corrige primero en el spec o el plan cuando el defecto proviene de una decisión, y después en el código.

## Cuándo se exige un spec

Se exige para:

- una sección nueva;
- cambios visibles de layout o contenido;
- una API, dependencia, script o hook nuevo;
- cambios de arquitectura, compatibilidad o presupuesto;
- trabajo que se divide en más de un issue;
- decisiones con riesgo de seguridad, accesibilidad o datos.

Un typo documental o una corrección mecánica pequeña puede usar solo un issue atómico si el contrato ya es inequívoco.

## Artefactos

Cada iniciativa vive en:

```text
specs/<issue-padre>-<slug>/
├── spec.md
├── plan.md
├── tasks.md
├── qa.md
└── migration-brief.md  # requerido para migraciones visuales
```

Usar las plantillas de `docs/templates/`. El número enlaza el issue padre de GitHub; no inventar IDs antes de crear el issue.

`migration-brief.md` no añade una segunda especificación. Resume la referencia,
las medidas, la reutilización y las excepciones responsive que se consultan
repetidamente. Su plantilla y workflow viven en
[`MIGRATION_PLAYBOOK.md`](MIGRATION_PLAYBOOK.md).

## Fase 1: Constitución

Antes de especificar, identificar las reglas aplicables de `AGENTS.md` y `docs/CONSTITUTION.md`. El spec no puede anularlas silenciosamente. Una excepción requiere enmienda o ADR aprobado.

## Fase 2: Spec

`spec.md` define **qué** y **por qué**, sin decidir prematuramente el cómo. Debe incluir:

- problema y resultado de usuario;
- alcance y fuera de alcance;
- copy y assets exactos cuando sean contrato;
- escenarios y estados responsive;
- requisitos funcionales y no funcionales;
- criterios de aceptación observables;
- riesgos, supuestos y preguntas abiertas.

No pasa a plan con marcadores `TBD` que cambien el resultado.

## Fase 3: Clarificación

Revisar ambigüedades antes de diseñar la solución. Las preguntas se resuelven en el spec con fecha y decisión. Si falta una decisión material del usuario, el trabajo permanece bloqueado; no se rellena con una preferencia personal.

## Fase 4: Plan

`plan.md` explica **cómo** se implementará:

- archivos y bloques afectados;
- tokens y APIs usados;
- alternativas consideradas;
- compatibilidad y migración;
- estrategia de QA;
- riesgos y rollback;
- necesidad de ADR.

El plan demuestra que la solución respeta arquitectura y presupuesto antes de escribir código.

## Fase 5: Tareas

`tasks.md` descompone el plan en issues atómicos. Una tarea atómica:

- produce un resultado demostrable;
- tiene un owner y un estado;
- puede revisarse independientemente;
- enlaza criterios concretos del spec;
- declara dependencias con relaciones nativas de GitHub;
- incluye su verificación y evidencia esperada;
- evita “y además”.

Una sección del homepage suele ser una tarea. Una iniciativa grande es issue padre y sus entregables son sub-issues. No usar checklists gigantes como sustituto de sub-issues trazables.

## Fase 6: Implementación

El agente o desarrollador trabaja un issue `Ready` por vez:

1. crea la rama;
2. confirma baseline, brief y tests relevantes;
3. calibra una sección representativa antes de producir toda una página visual;
4. implementa el menor cambio que satisface el spec;
5. actualiza artefactos si descubre una inconsistencia;
6. ejecuta QA proporcional al riesgo;
7. registra evidencia en `qa.md` y el PR.

El código no introduce decisiones nuevas. Si aparecen, se pausa la implementación y se actualiza spec/plan.

## Fase 7: Consistency check

Antes del PR, comparar:

- Constitución ↔ spec;
- spec ↔ plan;
- criterios ↔ tareas;
- tareas ↔ diff;
- diff ↔ evidencia;
- documentación ↔ comportamiento real.

Una contradicción se resuelve en la fuente superior, no con una nota evasiva en el PR.

## Baseline y cierre

`qa.md` conserva versión de WordPress/PHP, entorno, URL, viewport, commit probado, resultados, capturas y limitaciones. El spec queda `Implemented` solo cuando todos sus sub-issues se cerraron y la evidencia cubre los criterios.

## Trazabilidad mínima

```text
Issue padre
  → specs/<issue>-<slug>/spec.md
    → plan.md
      → sub-issue atómico
        → rama + commits
          → PR con Closes #N
            → qa.md + checks
```

Fuente metodológica: [GitHub Spec Kit](https://github.github.com/spec-kit/) y su documento [Spec-Driven Development](https://github.com/github/spec-kit/blob/main/spec-driven.md).
