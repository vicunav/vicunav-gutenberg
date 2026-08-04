# Qwen en este proyecto

## Propósito

El servidor MCP global `qwen-bridge` permite delegar trabajo mecánico a Qwen.
La lectura y los borradores están disponibles globalmente; la escritura directa
permanece deshabilitada por defecto y este repositorio la habilita solo dentro
de tres áreas no ejecutables.

## Áreas permitidas

| Ruta | Uso | Versionada |
|---|---|---|
| `scratch/qwen/` | Experimentos y artefactos descartables | No |
| `docs/qa/evidence/generated/` | Métricas, matrices y resúmenes mecánicos de QA | Sí |
| `docs/generated/drafts/` | Borradores y boilerplate antes de promoción manual | Sí |

La allowlist vive en `.codex/config.toml` y usa rutas relativas al workspace
para no acoplar el repositorio a una cuenta o máquina. URL, modelo y estadísticas
se heredan de la configuración global de Codex.

## Áreas prohibidas

`ask_qwen_apply` no tiene autorización para escribir en el runtime del theme ni
en sus contratos canónicos. Esto incluye `theme.json`, `functions.php`,
`patterns/`, `templates/`, `parts/`, `inc/`, `bin/`, `config/`, `assets/`,
`styles/`, `specs/`, archivos raíz y configuración de GitHub.

No se amplía la allowlist para resolver un rechazo puntual. Una ruta nueva
requiere issue, evaluación de riesgo y configuración local al proyecto.

## Uso esperado

- Usar `ask_qwen_review` cuando el resultado necesite juicio o pueda afectar
  contenido, diseño, seguridad, arquitectura o comportamiento.
- Usar `ask_qwen_apply` solo para trabajo bien especificado, repetitivo y
  verificable dentro de las tres rutas autorizadas.
- Preferir el validador `gutenberg` cuando el borrador contenga markup de
  bloques, aunque permanezca fuera del runtime.
- Inspeccionar siempre `git diff`, ejecutar los checks aplicables y promover el
  resultado manualmente mediante el issue que lo gobierna.
- No enviar secretos, datos personales, formularios reales ni contenido de
  producción a Qwen.

## Verificación

La configuración efectiva debe conservar `OLLAMA_URL`, `OLLAMA_MODEL` y
`QWEN_STATS_ENABLED` globales, además de añadir la allowlist del proyecto:

```bash
/Applications/ChatGPT.app/Contents/Resources/codex mcp get qwen-bridge
```

Después de cambiar `.codex/config.toml`, reiniciar Codex o abrir una tarea nueva
en este workspace. Una prueba de escritura debe usar primero `scratch/qwen/` y
confirmar también que una ruta de runtime continúa rechazada.
