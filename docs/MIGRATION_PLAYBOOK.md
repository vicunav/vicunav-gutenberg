# Playbook de migración visual a Gutenberg

## Propósito

Este playbook convierte lo aprendido al migrar el homepage y la página de
Servicios en un proceso repetible para páginas nuevas y para sitios completos.
Su objetivo es reducir descubrimiento duplicado, deriva visual, retrabajo y
contexto innecesario sin sacrificar editabilidad, accesibilidad, rendimiento o
seguridad.

Aplica cuando existe una referencia visual que debe reproducirse en un block
theme. Complementa, no reemplaza, `AGENTS.md`, la Constitución, el Design
System, el spec y los quality gates.

## Lo que aprendimos

### 1. Paridad funcional no significa paridad visual

Una página puede tener el copy correcto, todos los patterns, assets locales,
semántica válida y cero errores, y aun verse lejos de la referencia. La
Definition of Done necesita dos gates distintos:

1. **integridad estructural:** contenido, bloques, editor, rutas y assets;
2. **fidelidad visual:** composición, ritmo, wrapping, encuadre y responsive.

No se declara una página lista después del primer gate.

### 2. La deriva se acumula cuando se compara demasiado tarde

En el homepage, la revisión incremental permitió calibrar sección por sección.
En Servicios, completar primero todas las secciones hizo que pequeñas
aproximaciones de ancho, padding, proporción e imagen se acumularan. La
corrección posterior fue más costosa.

La solución es un **pattern de calibración**: se implementa una sección
representativa, se compara y se aprueba el lenguaje de layout antes de producir
las demás.

### 3. El baseline debe medir, no solo mostrar

Las capturas son indispensables, pero no explican por sí solas una diferencia.
Por página se registran también:

- ancho útil real, no solo viewport nominal;
- altura y fondo de cada sección;
- ancho máximo y gutters;
- ratios y gaps de columnas;
- tamaño/interlineado y saltos editoriales importantes;
- dimensiones, `object-fit` y `object-position` de imágenes;
- estados iniciales de controles;
- diferencias de orden o composición en móvil.

Las medidas son señales de diagnóstico. No sustituyen la inspección visual.

### 4. Móvil es otra composición

Colapsar columnas no reproduce necesariamente el diseño móvil. Puede cambiar el
orden, el ancho de una imagen, la alineación, el espaciado, el crop o la
jerarquía. Cada sección se inspecciona en escritorio y móvil antes de cerrar su
issue; tablet valida la transición entre ambos.

### 5. Reutilizar tokens no implica reutilizar layout

Colores, fuentes, escalas y superficies sí deben reutilizarse. Los ratios de
columnas, el orden responsive, el crop y ciertas dimensiones estructurales
pueden ser propios de una composición. Forzar un token nuevo por cada medida
inunda el sistema; forzar un layout genérico destruye la fidelidad.

Se mantiene esta frontera:

- **token:** decisión visual recurrente y nombrable;
- **CSS estructural local:** `0`, bordes de `1px`, ratios, breakpoints,
  orden, grid y ajustes de encuadre;
- **valor visual nuevo:** solo entra a `theme.json` si cumple los criterios de
  `DESIGN_SYSTEM.md`.

### 6. El estado estable de producción es la referencia

Elementor puede ocultar o desplazar contenido durante animaciones de entrada.
Una captura tomada durante ese estado produce un baseline falso. Se espera a
que el viewport se estabilice y se registra por separado:

- estado visual final que debe clonarse;
- movimiento observado, para una fase posterior;
- comportamiento que deliberadamente queda fuera de alcance.

### 7. Gutenberg debe validarse como producto, no solo como renderer

El frontend puede verse bien y el Site Editor quedar confuso o inválido. Cada
página necesita:

- template canónico sin título de entrada duplicado;
- estructura protegida y contenido editable;
- patterns reconocibles;
- representación coherente en editor y frontend;
- ausencia de overrides accidentales en base de datos.

### 8. La evidencia reusable ahorra contexto

Las decisiones no deben redescubrirse en cada conversación. Los hechos de una
página viven en un brief corto; el agente o desarrollador lee solo las fuentes
relevantes y enlaza evidencia extensa en vez de copiarla.

## Unidad de repetición

| Frecuencia | Se resuelve | Se reutiliza |
|---|---|---|
| Una vez por sitio | Arquitectura, LocalWP, socket, compatibilidad, header, footer, fuentes, tokens, editor, gates | En todas las páginas |
| Una vez por familia de páginas | Template base, gutter, superficies, CTA, cards y comportamiento responsive compartido | En páginas equivalentes |
| Una vez por página | Inventario, brief, baseline, mapa de secciones, assets, template y QA integral | Durante todos sus issues |
| Una vez por sección | Pattern, CSS estructural, comparación visual y commit | En el ensamblaje de la página |

Si una tarea vuelve a resolver algo de una fila superior, debe justificar por
qué la decisión existente no aplica.

## Artefactos mínimos por página

Dentro de `specs/<issue>-<slug>/`:

```text
spec.md
plan.md
tasks.md
qa.md
migration-brief.md
```

`migration-brief.md` usa `docs/templates/MIGRATION_BRIEF.md` y es el paquete
compacto de contexto. No duplica el spec ni la evidencia; reúne los hechos que
se consultan repetidamente durante la implementación.

La evidencia visual vive en:

```text
docs/qa/evidence/<slug>/
├── baseline/
└── regression/
```

## Workflow optimizado

### Fase 0 — Preparar el alcance

1. Leer `AGENTS.md`, este playbook, `DESIGN_SYSTEM.md` y el spec de la página.
2. Confirmar URL de referencia, URL local, rutas y estado de autenticación.
3. Separar clon visual, optimización y rediseño.
4. Crear issue padre, artefactos SDD y sub-issues atómicos.
5. Declarar elementos excluidos: animaciones, integraciones, contenido dinámico
   o limitaciones técnicas conocidas.

**Gate:** no hay preguntas que cambien el resultado visual o funcional.

### Fase 1 — Capturar el baseline una sola vez

1. Esperar a que fuentes, imágenes y animaciones estén estables.
2. Capturar referencia anónima en `1440×900`, `390×844` y, si el cambio de
   composición lo exige, `768×1024`.
3. Recorrer toda la página en segmentos con solape; no depender solo de una
   captura full-page.
4. Registrar mapa, copy, estados, medidas y assets en `migration-brief.md`.
5. Identificar componentes ya resueltos en el theme.
6. Guardar procedencia y checksum de cada asset local.

**Gate:** otra persona puede explicar la página y sus excepciones responsive
sin volver a inspeccionar producción.

### Fase 2 — Alinear el sistema antes del markup

1. Mapear colores, fuentes, tamaños y espaciados a tokens existentes.
2. Detectar como candidatos solo valores recurrentes que no entren en la
   tolerancia aprobada.
3. Definir estilos de superficie y componentes compartidos.
4. Separar CSS visual global de CSS estructural por sección.
5. Resolver assets y estrategia LCP/lazy antes de construir todas las secciones.

**Gate:** no hay colores ni familias tipográficas pendientes dentro de patterns.

### Fase 3 — Calibrar con una sección representativa

Elegir el hero o la sección que concentre más decisiones de layout. Completar:

1. pattern, asset y CSS;
2. frontend desktop y móvil;
3. Site Editor;
4. comparación macro y micro;
5. revisión temprana del usuario.

La calibración fija gutters, ancho útil, escala, tratamiento de imágenes,
botones y criterio de aproximación para las secciones restantes.

**Gate:** la sección se percibe equivalente, no solo correcta.

### Fase 4 — Implementar estructura por secciones

Por cada issue:

1. usar bloques core y presets existentes;
2. copiar contenido desde el inventario, no desde memoria;
3. declarar dimensiones y carga de assets;
4. preservar semántica y edición `contentOnly` cuando aplique;
5. integrar el pattern en el template incremental;
6. ejecutar lint, render y smoke;
7. hacer commit de la sección.

La implementación avanza en orden visual para que cualquier divergencia sea
localizable.

### Fase 5 — Pasadas de fidelidad visual

#### Pasada A: macrogeometría

Comparar primero a `1440×900`:

- orden y fondo de secciones;
- altura aproximada;
- ancho máximo y gutters;
- ratios, gaps y alineación de columnas;
- tamaño y posición de imágenes;
- bloques compartidos que deben formar una sola superficie.

No ajustar microtipografía mientras la geometría principal sea incorrecta.

#### Pasada B: composición móvil

Comparar a `390×844`:

- orden real de elementos;
- ancho y crop de imágenes;
- alineación y jerarquía;
- espaciado vertical;
- controles abiertos/cerrados;
- saltos de línea importantes.

Validar luego `320×800` para reflow y `768×1024` para la transición.

#### Pasada C: detalle editorial

Ajustar:

- tamaño, line-height, peso y wrapping;
- dividers, radios, bordes y estados;
- padding interno de cards y botones;
- `object-position`;
- detalles de superficie y overlays.

Cada cambio debe corregir una diferencia observada. No se pule por intuición.

### Fase 6 — Ensamblaje y editor

1. Confirmar un solo `h1` y jerarquía completa.
2. Verificar que no aparece el título administrativo de la página.
3. Abrir el template en Site Editor.
4. Confirmar blocks válidos, locks correctos y contenido editable.
5. Detectar overrides guardados antes de comparar el theme limpio.
6. Revisar header y footer sin reimplementarlos.

### Fase 7 — QA integral

Ejecutar:

- `composer qa`, `composer audit` y `git diff --check`;
- HTTP, rutas, links, consola y assets;
- teclado, foco, headings, alt text, contraste y reflow;
- Lighthouse con corrida fría y estabilizada;
- comparación final sección por sección;
- revisión del diff y evidencia contra el commit probado.

Una página solo pasa cuando integridad estructural y fidelidad visual están
aprobadas.

## Umbrales de diagnóstico

Los siguientes valores disparan revisión; no reemplazan el juicio visual:

| Control | Señal de revisión |
|---|---|
| Alto acumulado de `main` | diferencia mayor a `0,5 %` con referencia estable |
| Alto de una sección | diferencia mayor a `max(24 px, 2 %)` |
| Bordes o ejes alineados | diferencia mayor a `8 px` |
| Token de espaciado | diferencia mayor a la tolerancia de `DESIGN_SYSTEM.md` |
| Wrapping | cambia una línea editorial importante |
| Reflow | `scrollWidth` supera `clientWidth` |
| Assets | error, hotlink, dimensión ausente o carga LCP incorrecta |

Excluir del cálculo la barra administrativa y separar header/footer compartidos
del contenido de `main`. Una sección puede tener la misma altura y una
composición incorrecta; por eso todo umbral exige inspección.

## Ledger de paridad por sección

Mantener en el brief o en `qa.md` una fila por sección:

| Sección | Contenido | Macro desktop | Móvil | Detalle | Editor | Estado |
|---|---|---|---|---|---|---|
| Hero | Pass | Pass | Pass | Pass | Pass | Ready |

No usar “se ve bien” como estado. Un `Pass` enlaza una captura, medida o prueba.

## Protocolo para ahorrar tiempo y contexto

### Lectura mínima al iniciar una página

1. `AGENTS.md`;
2. `docs/MIGRATION_PLAYBOOK.md`;
3. `docs/DESIGN_SYSTEM.md`;
4. `specs/<issue>-<slug>/migration-brief.md`;
5. spec, plan, task y QA del issue activo.

No cargar evidencia histórica completa de otras páginas salvo que se investigue
una regresión compartida.

### Registrar una vez, referenciar después

- El copy canónico vive en el inventario/spec.
- Las medidas y excepciones viven en el brief.
- La procedencia de assets vive en `assets/images/SOURCES.md`.
- Las pruebas finales viven en `qa.md` y `docs/qa/evidence/`.
- El PR resume y enlaza; no vuelve a contener todo el dossier.

### Trabajar en lotes coherentes

- Una sesión de referencia captura todos los viewports y medidas.
- Una sesión local compara las mismas secciones en el mismo orden.
- Los checks rápidos corren por sección; la matriz completa corre al ensamblar.
- La retroalimentación visual se convierte en diferencias concretas antes de
  modificar CSS.

### Checkpoints humanos

Pedir revisión:

1. después del baseline si hay ambigüedad;
2. después del pattern de calibración;
3. después de la macrogeometría completa;
4. antes de merge, con QA final.

Esto evita revisar diez secciones con el mismo supuesto incorrecto.

## Antipatrones

- construir toda la página antes de comparar;
- llamar “pixel perfect” a una página medida solo por altura;
- asumir que `Columns` colapsado representa el diseño móvil;
- crear tokens para valores locales o repetir valores visuales sin token;
- corregir frontend sin abrir Site Editor;
- capturar producción durante animaciones;
- usar assets remotos “temporalmente” y olvidarlos;
- mezclar clon, optimización y rediseño en el mismo issue;
- ampliar un PR con deuda descubierta que no bloquea su criterio;
- repetir contexto extenso en cada issue o conversación.

## Cuándo automatizar

Después de aplicar este playbook en al menos una página adicional, evaluar un
issue separado para:

- captura programática con nombres y viewports canónicos;
- extracción de medidas por sección;
- diff visual con umbral;
- comprobación de hotlinks y assets rotos;
- reporte consolidado de Lighthouse y accesibilidad.

La automatización debe codificar un proceso estable; no reemplazar una
metodología todavía cambiante.
