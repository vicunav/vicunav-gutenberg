# Eficiencia de contexto y ejecución

## Propósito

Esta guía reduce contexto, tiempo y consumo de tokens sin convertir la economía
de ejecución en una excusa para omitir dependencias, pruebas o revisión
transversal. Aplica a personas y agentes que implementan issues del theme.

La regla central es **contexto mínimo suficiente**: empezar por la unidad
atómica y ampliar la lectura solo cuando una dependencia, un riesgo o una
evidencia concreta lo exija.

## Paquete de contexto por issue

Antes de editar, reunir un paquete compacto:

1. `AGENTS.md` aplicable;
2. issue activo y criterios de aceptación;
3. spec, plan, tarea y QA enlazados;
4. `migration-brief.md` si existe referencia visual;
5. archivos que se modificarán y sus dependencias directas;
6. comandos de verificación aplicables.

El brief registra el paquete y sus exclusiones. No copia archivos completos ni
evidencia extensa: enlaza las fuentes canónicas.

## Niveles de lectura

| Nivel | Cuándo | Contexto |
|---|---|---|
| Atómico | Caso normal | Paquete del issue, archivos afectados y pruebas enfocadas |
| Dependencias | Un contrato compartido puede cambiar | Callers/consumidores directos, tokens, template parts, hooks o fixtures relacionados |
| Transversal | Seguridad, release, arquitectura, editor, rendimiento o regresión compartida | Superficies necesarias para evaluar el riesgo, con motivo registrado |

No se revisa el repositorio completo por rutina. Tampoco se prohíbe hacerlo
cuando el resultado depende de contratos globales. «Nunca leer fuera del issue»
sería inseguro para cambios en `theme.json`, header, footer, hooks, build o
release.

## Qué no cargar por defecto

- core de WordPress, dependencias instaladas y artefactos compilados;
- evidencia binaria histórica de páginas no relacionadas;
- logs completos cuando basta el error y su contexto;
- specs cerrados que no gobiernan el cambio;
- contenido repetido que ya tiene una fuente canónica.

Estas exclusiones son una política de selección, no una razón para crear un
archivo `.codexignore` no documentado. Los lockfiles permanecen versionados:
normalmente no se leen, pero sí se revisan cuando cambia una dependencia porque
protegen reproducibilidad y auditoría.

## Continuidad del trabajo

- Mantener una misma tarea para una unidad coherente conserva decisiones y
  evita reexplicar el problema.
- Abrir otra tarea cuando cambia el objetivo, existe una bifurcación real o el
  aislamiento reduce riesgo.
- Antes de una pausa larga, dejar estado durable en issue, brief, commit o PR:
  alcance, decisiones, archivos afectados, checks y siguiente paso.
- El chat ayuda a continuar; el repositorio y GitHub son la memoria canónica.

## Migración visual eficiente

### Observaciones antes que tokens

Capturar una vez el estado estable en los viewports canónicos y guardar:

- screenshots segmentados;
- mapa de secciones y copy;
- medidas relevantes en `metrics.json`;
- estados responsive y de controles;
- procedencia de assets.

Ese JSON contiene **observaciones del baseline**, no design tokens aprobados.
Una medida asciende a `theme.json` solo si representa una decisión visual
recurrente y cumple `DESIGN_SYSTEM.md`. Geometría local, crop, ratios y orden
responsive permanecen cerca de la composición.

### Traducción semántica

Preferir bloques core y la estructura menos profunda que conserve semántica,
edición y responsive:

| Origen | Traducción preferida |
|---|---|
| Container / Inner Section | `core/group`, `core/columns` o `core/grid`, según la composición |
| Heading | `core/heading` con nivel correcto |
| Text Editor | `core/paragraph` o `core/list` |
| Imagen | `core/image` o background de `core/group` cuando sea decorativa |
| CTA | `core/buttons` y `core/button` |

El objetivo no es «cero `div`»: los bloques core generan wrappers legítimos.
La regla es **cero wrappers sin responsabilidad** y evitar `core/html` cuando
una API pública o un bloque core resuelve el caso. Un wrapper mínimo es válido
si aporta layout, accesibilidad, locking o una superficie editable.

### Comparación acotada

Trabajar sección por sección:

1. inspeccionar baseline y métricas de la sección;
2. implementar con contratos existentes;
3. comparar desktop y móvil;
4. registrar solo las diferencias observadas;
5. ejecutar checks enfocados;
6. correr la matriz integral al ensamblar la página.

No mantener una inspección visual continua si no cambió la referencia. Volver a
producción solo ante ambigüedad, contenido dinámico o evidencia desactualizada.

## Estrategia de pruebas

| Capa | Técnica | Qué protege |
|---|---|---|
| Lógica pura | Unit tests y mocks mínimos | Transformaciones y ramas sin I/O |
| Integración WordPress | LocalWP/WordPress real y datos controlados | Hooks, templates, registro, persistencia y compatibilidad |
| Contrato estructural | Linters y validadores deterministas | Markup de bloques, rutas, tokens y assets |
| Producto | Browser, editor, accesibilidad y regresión visual | Comportamiento que los mocks no pueden demostrar |

Los mocks sustituyen fronteras externas, no el comportamiento que se pretende
validar. Una suite excesivamente mockeada puede pasar mientras WordPress falla.

No existe un gate universal de «esqueleto primero». Para un cambio pequeño se
escriben directamente las pruebas mínimas completas. Se propone primero el mapa
de `describe`/`it` o stubs solo cuando una suite grande necesita acordar alcance,
matriz o arquitectura antes de invertir en su implementación.

## Modelos, herramientas y delegación

El repositorio define clases de trabajo, no nombres de modelos:

- **rutina:** búsqueda enfocada, cambios mecánicos y checks deterministas;
- **razonamiento alto:** arquitectura, seguridad, compatibilidad, diagnóstico
  ambiguo y revisión transversal.

La persona o superficie que ejecuta el trabajo selecciona el modelo disponible
y el esfuerzo apropiado. Fijar nombres como política envejece rápido y puede no
coincidir con las capacidades de la sesión.

Delegar solo tareas independientes, acotadas y explícitamente autorizadas
cuando el beneficio de paralelismo supera el costo de duplicar contexto. Los
subagentes no son una estrategia automática de ahorro: cada uno consume su
propio contexto y herramientas.

En Codex CLI, `/status` y `/usage` permiten inspeccionar sesión y consumo. Son
controles opcionales del operador, no quality gates ni recordatorios que deban
interrumpir cada ronda de pruebas.

## Formato de resultados

- Liderar con resultado, riesgos y siguiente decisión.
- Enlazar archivos, issue, evidencia y logs; no volver a copiarlos.
- Mostrar solo el fragmento de error necesario y conservar el artefacto
  completo fuera del mensaje cuando aporte trazabilidad.
- Evitar comentarios que repitan el código y explicaciones teóricas que no
  cambien una decisión.
- Cerrar cada checkpoint con estado, checks ejecutados y trabajo pendiente.

## Señales para ampliar contexto

Ampliar la lectura cuando:

- cambia una API, token o template part compartido;
- el diff toca seguridad, datos, capacidades, nonces o escaping;
- una prueba enfocada falla fuera del archivo editado;
- frontend y Site Editor divergen;
- una optimización puede mover LCP, CLS, caché o carga de assets;
- el issue contradice un spec, ADR o regla superior;
- la causa no queda demostrada con el paquete atómico.

Registrar el motivo. Si ninguna señal existe, mantener el alcance original.
