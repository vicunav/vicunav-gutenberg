# Sistema documental

Este directorio convierte los requisitos del proyecto en decisiones y gates ejecutables.

## Orden de autoridad

Cuando dos fuentes entren en conflicto, resolver en este orden:

1. `AGENTS.md`: alcance y restricciones no negociables de la fase.
2. `CONSTITUTION.md`: principios permanentes de ingeniería.
3. spec aprobado del cambio y sus criterios de aceptación.
4. ADR aceptado.
5. guías técnicas de este directorio.
6. implementación actual.

El código existente no invalida una regla superior. Si una regla necesita cambiar, se modifica primero la fuente de autoridad y se registra la decisión.

## Mapa

| Documento | Pregunta que responde |
|---|---|
| [CONSTITUTION.md](CONSTITUTION.md) | ¿Qué principios no se negocian? |
| [ARCHITECTURE.md](ARCHITECTURE.md) | ¿Cómo se estructura y dónde vive cada responsabilidad? |
| [DESIGN_SYSTEM.md](DESIGN_SYSTEM.md) | ¿Qué tokens existen y cuándo se puede añadir otro? |
| [EDITOR.md](EDITOR.md) | ¿Qué puede editarse y cómo se gestionan los overrides? |
| [CONTACT_FORM.md](CONTACT_FORM.md) | ¿Cómo se configura, prueba y opera el formulario? |
| [MIGRATION_PLAYBOOK.md](MIGRATION_PLAYBOOK.md) | ¿Cómo se reproduce una página con fidelidad sin repetir descubrimiento? |
| [CONTEXT_EFFICIENCY.md](CONTEXT_EFFICIENCY.md) | ¿Qué contexto es suficiente y cuándo debe ampliarse? |
| [SPEC_DRIVEN_DEVELOPMENT.md](SPEC_DRIVEN_DEVELOPMENT.md) | ¿Cómo pasa una intención a implementación verificable? |
| [WORKFLOW.md](WORKFLOW.md) | ¿Cómo se organiza el trabajo en GitHub y Git? |
| [QA.md](QA.md) | ¿Qué evidencia demuestra que un cambio está terminado? |
| [PERFORMANCE.md](PERFORMANCE.md) | ¿Qué presupuestos y técnicas protegen la velocidad? |
| [ACCESSIBILITY.md](ACCESSIBILITY.md) | ¿Cómo se asegura WCAG 2.2 AA? |
| [RELEASES.md](RELEASES.md) | ¿Cómo se empaqueta, publica y revierte? |
| [REFERENCES.md](REFERENCES.md) | ¿Qué fuentes oficiales respaldan las reglas? |

Las plantillas reutilizables viven en `docs/templates/`. Las decisiones arquitectónicas futuras se documentan en `docs/adr/`.

La evidencia consolidada de Fase 1 vive en `docs/qa/evidence/phase-1/`: comparación visual, responsive cross-browser, accesibilidad, rendimiento y release candidate.

La migración de la página de Servicios se especifica en `specs/2-servicios/`; su baseline y la evidencia de implementación viven en `docs/qa/evidence/services/`.

Portafolio se especifica en `specs/65-portafolio/`. Contacto se especifica en
`specs/69-contacto/`; su formulario, QA y operación están documentados en
[CONTACT_FORM.md](CONTACT_FORM.md).

## Mantenimiento

- Un cambio de contrato actualiza el spec.
- Un cambio transversal o difícil de revertir genera un ADR.
- Un cambio de gate actualiza QA y la plantilla de PR.
- Un cambio de soporte actualiza README, `style.css`, matriz QA y release.
- Enlaces y versiones se revisan al menos en cada release menor.
