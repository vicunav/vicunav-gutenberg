# Constitución de ingeniería

Versión: 1.0.0<br>
Ratificada: 2026-07-20

## I. Fidelidad antes que rediseño

La Fase 1 reproduce el homepage aprobado. Copy, orden, jerarquía, colores, tipografía e imágenes no se reinterpretan. Una diferencia requiere una limitación técnica documentada y aceptada.

## II. Gutenberg nativo

La solución usa un block theme Full Site Editing. Se prefieren bloques core, template parts y patterns registrados. Un bloque custom necesita un spec independiente que demuestre que los bloques core no cubren el caso.

## III. Tokens como contrato

Color y tipografía se definen en `theme.json` y se consumen mediante presets. Los valores visuales repetidos se convierten en tokens; no se dispersan por markup o CSS.

## IV. Responsabilidad mínima del theme

El theme controla presentación. Formularios, reservas, SEO, analytics, datos de negocio, roles y automatizaciones pertenecen a WordPress core, plugins o infraestructura. Cambiar de theme no debe destruir funcionalidad ni datos.

## V. Accesibilidad por defecto

Todo cambio nuevo o modificado apunta a WCAG 2.2 nivel AA. Semántica, teclado, foco, contraste, texto alternativo, reflow y reduced motion forman parte del diseño y de QA.

## VI. Rendimiento con presupuesto

No se añade un asset, dependencia o script sin necesidad y medición. Se protegen LCP, INP y CLS, y se comparan resultados contra una baseline reproducible.

## VII. Seguridad y privacidad

Se minimiza la superficie de ataque, se usan APIs de WordPress, se valida entrada y se escapa salida. No hay telemetría ni recursos remotos sin consentimiento. Los secretos nunca entran al repositorio.

## VIII. Spec y trazabilidad

El spec es la fuente de verdad del cambio; el código es su implementación. Todo trabajo no trivial mantiene trazabilidad entre issue, spec, plan, tareas, commits, PR y evidencia.

## IX. Issues atómicos

Cada issue entrega un resultado independiente, revisable y verificable. Las iniciativas grandes son issues padre con sub-issues; las dependencias se expresan explícitamente, no dentro de texto informal.

## X. Evidencia antes de “hecho”

Una afirmación de calidad debe incluir evidencia: comando, captura, comparación, reporte o prueba manual registrada. “Funciona en mi máquina” no es un criterio de cierre.

## XI. Decisiones reversibles

Se prefiere la opción más simple, nativa y reversible. Las decisiones transversales, costosas o difíciles de deshacer se aprueban mediante ADR.

## XII. Comunicación profesional

Documentación y comentarios de código se escriben en español claro. Identificadores conservan las convenciones técnicas existentes. El repositorio debe permitir que otra persona continúe el trabajo sin depender de memoria privada.

## Enmiendas

Una enmienda requiere issue, motivación, impacto, alternativas, plan de migración, PR y actualización de versión de esta Constitución:

- `PATCH`: aclaración sin cambiar una obligación.
- `MINOR`: principio o gate nuevo compatible.
- `MAJOR`: eliminación o cambio incompatible de un principio.
