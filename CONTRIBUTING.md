# Guía de contribución

## Antes de empezar

1. Leer `AGENTS.md`, `docs/CONSTITUTION.md` y `docs/ARCHITECTURE.md`.
2. Confirmar que existe un issue con alcance, criterios de aceptación y verificación.
3. Revisar dependencias y decisiones abiertas. Un issue bloqueado no pasa a desarrollo.
4. Para features o cambios de arquitectura, crear primero los artefactos SDD descritos en `docs/SPEC_DRIVEN_DEVELOPMENT.md`.
5. Para una migración visual, leer `docs/MIGRATION_PLAYBOOK.md` y completar
   `migration-brief.md` antes del primer pattern.
6. Aplicar `docs/CONTEXT_EFFICIENCY.md`: comenzar con el paquete del issue y
   ampliar la lectura solo ante dependencias o riesgos demostrables.

## Definition of Ready

Un issue está `Ready` cuando:

- expresa un solo resultado observable;
- identifica el spec o requerimiento que satisface;
- tiene criterios de aceptación verificables;
- declara fuera de alcance, dependencias y riesgos;
- indica qué QA debe producir evidencia;
- no contiene una decisión de producto o diseño pendiente.
- si reproduce una referencia, enlaza un baseline estable y su brief de
  migración.

## Ramas

Crear una rama desde `main` actualizada:

```text
feat/123-hero
fix/123-navegacion-movil
docs/123-workflow-qa
chore/123-tooling
```

Una rama corresponde normalmente a un issue atómico. No mezclar refactors oportunistas ni cambios de contenido ajenos.

## Implementación

- Preservar cambios existentes que no pertenezcan al issue.
- Usar bloques core y APIs públicas de WordPress.
- Referenciar color y tipografía mediante presets de `theme.json`.
- Mantener documentación y comentarios de código en español.
- No añadir dependencias, JavaScript o PHP sin justificar su necesidad en el plan.
- No modificar producción desde este repositorio.
- Registrar una decisión irreversible o transversal como ADR antes de implementarla.

## Commits

Usar Conventional Commits con descripción breve en español:

```text
feat: crea el pattern hero
fix: corrige el orden de foco del menú
test: añade validación del footer
docs: documenta el presupuesto de rendimiento
chore: configura el linter del theme
refactor: simplifica la composición del CTA
```

Cada commit debe representar una unidad coherente y dejar el repositorio en estado verificable. En esta migración, una sección terminada conserva su commit propio.

## Pull requests

El PR debe:

- enlazar el issue con `Closes #N` cuando corresponda;
- explicar el resultado y las decisiones, no narrar cada edición;
- incluir evidencia visual para cambios de interfaz;
- incluir resultados de QA y riesgos residuales;
- actualizar spec, ADR, documentación o changelog si cambió el contrato;
- evitar archivos generados, secretos, dumps y configuración local.

Como heurística, un PR debería poder revisarse en menos de 30 minutos. Si supera una sección, mezcla capas o requiere varias conversaciones independientes, dividirlo mediante sub-issues.

## Definition of Done

Un cambio está terminado cuando:

- `composer qa` y `composer audit` pasan;
- satisface todos los criterios de aceptación;
- pasa los gates aplicables de `docs/QA.md`;
- no introduce warnings de WordPress, PHP o consola;
- funciona en editor y frontend;
- cumple WCAG 2.2 AA en el alcance afectado;
- no empeora los presupuestos de rendimiento;
- mantiene la trazabilidad issue → spec → commits → PR → evidencia;
- deja documentación y changelog sincronizados;
- fue revisado y puede revertirse de forma clara.

## Revisión

La revisión se realiza en este orden:

1. intención y alcance;
2. arquitectura y compatibilidad WordPress;
3. seguridad y privacidad;
4. accesibilidad;
5. funcionalidad y contenido;
6. rendimiento;
7. mantenibilidad y documentación.

Los detalles completos del ciclo están en `docs/WORKFLOW.md`.
