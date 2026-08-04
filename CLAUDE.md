# Adaptador para Claude Code

Este archivo no define una política alternativa. Su única función es conectar
Claude Code con el contrato neutral y versionado del proyecto.

## Antes de actuar

1. Lee `AGENTS.md` completo y trátalo como la fuente canónica de instrucciones.
2. Lee `docs/HANDOFF.md` para conocer el estado y el siguiente issue.
3. Abre el issue activo y el paquete de contexto indicado allí.
4. Respeta el orden de autoridad de `docs/README.md`.
5. Ejecuta los checks enfocados durante la iteración y los gates completos antes
   de publicar.

Si este archivo contradice `AGENTS.md`, prevalece `AGENTS.md`. No copies sus
reglas aquí ni crees hooks, settings, comandos o dependencias exclusivos de
Claude sin un issue y una decisión aprobada. GitHub, los specs, los ADR y la
evidencia versionada son la memoria durable; la conversación del agente no lo
es.

El workflow es el mismo para personas, Codex, Claude Code u otros agentes:
issue atómico, rama trazable, implementación acotada, QA, PR, checks verdes,
squash merge y sincronización de `main`.
