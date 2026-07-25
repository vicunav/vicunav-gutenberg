# Spec: clon exacto del homepage en Gutenberg

Issue padre: #1<br>
Estado: Draft para aprobación<br>
Owner: @mariovicunadev<br>
Última actualización: 2026-07-25

## Problema

El homepage público de Vicunav depende actualmente de Elementor. La presentación y el contenido aprobados deben migrarse a un block theme nativo de Gutenberg sin mezclar la conversión técnica con un rediseño. El resultado debe conservar la experiencia reconocible del sitio y, al mismo tiempo, quedar mantenible desde Full Site Editing.

La persona afectada es quien visita el homepage para entender la oferta de Vicunav y quien mantiene el sitio en WordPress. La migración fracasa si cambia silenciosamente el mensaje, la jerarquía, el orden, la identidad visual o la capacidad de navegar y contactar.

## Resultado esperado

Al activar el theme `vicunav` en LocalWP, la portada usa `templates/front-page.html`, template parts y diez patterns registrados para reproducir el homepage de referencia. Estructura, copy, colores, tipografía, imágenes y comportamiento responsive son equivalentes al sitio actual dentro de las excepciones explícitas de este spec.

El resultado se puede editar e inspeccionar en Gutenberg sin bloques inválidos, no depende de Elementor para renderizar el homepage y no modifica producción.

## Alcance

- El homepage servido por `front-page.html`.
- Los template parts existentes `parts/header.html` y `parts/footer.html` como cabecera y pie del homepage.
- Diez patterns: hero, situaciones, introducción de cómo ayudamos, proceso, testimonio, resultados, debería sentirse como tú, conoce a Mario, marcas y CTA final.
- Assets locales necesarios para reproducir el contenido aprobado.
- Paridad visual en desktop, tableta y móvil.
- Compatibilidad con el editor del sitio y el frontend.
- QA visual, responsive, accesibilidad, rendimiento, seguridad y preparación de release candidate.

## Fuera de alcance

- Rediseñar la paleta, tipografía, composición, copy, imágenes o mensaje.
- Crear templates para Servicios, Portafolio, Contacto u otras páginas.
- Añadir bloques custom, animaciones de Elementor, parallax o scripts de interacción propios.
- Implementar formularios, reservas, SEO, analytics, schema, CPT, roles o almacenamiento de datos en el theme.
- Migrar contenido almacenado en producción, retirar Elementor o desplegar a producción.
- Resolver la Fase 2 o anticipar sus decisiones visuales.
- Crear CI como efecto lateral; cualquier automatización nueva requiere su propia iniciativa SDD.

## Precondiciones aprobadas

- `theme.json` versión 3 contiene la paleta, las cuatro familias tipográficas y escalas de tamaño/espaciado.
- `parts/header.html` y `parts/footer.html` contienen el inventario aprobado y usan presets.
- El repositorio está enlazado al theme activo de LocalWP mediante symlink.
- Compatibilidad declarada: WordPress 6.7 o superior y PHP 8.0 o superior.
- Baseline local comprobada: WordPress 7.0.2 y PHP 8.2.

## Requisitos

### Funcionales

- **RF-01:** WordPress debe seleccionar `templates/front-page.html` para la portada.
- **RF-02:** `front-page.html` debe incluir header, un landmark `main`, los diez patterns en el orden aprobado y footer.
- **RF-03:** cada sección debe existir en un único archivo PHP registrado dentro de `patterns/`, con headers `Title`, `Slug`, `Categories` y `Block Types` y namespace `vicunav/`.
- **RF-04:** todos los patterns deben componerse con bloques core. Un bloque custom exige un spec distinto y queda fuera de esta fase.
- **RF-05:** el logo debe enlazar al inicio; navegación y CTAs deben tener destinos coherentes con el contenido aprobado.
- **RF-06:** frontend y Site Editor deben procesar templates, parts y patterns sin bloques inválidos, errores fatales ni salida vacía.
- **RF-07:** cambiar de theme no debe eliminar datos ni funcionalidad de negocio.
- **RF-08:** la portada no debe requerir Elementor, JavaScript propio ni recursos remotos para su primer render.

### Contenido y diseño

- **RD-01:** el orden obligatorio es header → hero → situaciones → introducción de cómo ayudamos → proceso → testimonio → resultados → debería sentirse como tú → conoce a Mario → marcas → CTA final → footer.
- **RD-02:** el copy, las mayúsculas, la puntuación, los números y la jerarquía editorial deben coincidir literalmente con el inventario de `AGENTS.md` y el contrato de contenido de este documento.
- **RD-03:** debe existir un solo `h1`, ubicado en el hero. Los títulos principales de sección usan `h2`; los títulos internos continúan la jerarquía sin saltos arbitrarios.
- **RD-04:** colores y familias tipográficas solo se consumen mediante presets de `theme.json`. No se permiten valores de color ni `font-family` hardcodeados en patterns, parts, templates o CSS suelto.
- **RD-05:** espaciado y tamaños deben reutilizar los presets existentes. Si una diferencia 1:1 demuestra que falta un token, se pausa la sección y se actualiza spec/plan antes de modificar `theme.json`.
- **RD-06:** las fuentes son Red Hat Display para cuerpo/UI, Bodoni Moda para títulos principales, Gloock para el acento serif detectado y Caveat para acentos manuscritos, según el uso visible de referencia.
- **RD-07:** todos los assets se sirven localmente. No se permiten hotlinks a `vicunav.com`, Google Fonts u otro tercero.
- **RD-08:** la imagen del hero puede ser un asset local equivalente, tal como autoriza `AGENTS.md`, pero debe conservar escena, función, encuadre y tono visual comparables; su procedencia y licencia deben registrarse.
- **RD-09:** cualquier otra imagen visible en la referencia se conserva o se sustituye únicamente cuando exista autorización equivalente; la decisión se documenta en el issue de la sección.
- **RD-10:** se omiten fade-ins, parallax y otros efectos de Elementor sin intentar reemplazarlos en Fase 1.
- **RD-11:** ninguna preferencia personal se acepta como justificación de una diferencia visual.

### No funcionales

- **RNF-01 — Accesibilidad:** cumplir WCAG 2.2 nivel AA para el contenido modificado, según `docs/ACCESSIBILITY.md`.
- **RNF-02 — Rendimiento:** respetar `docs/PERFORMANCE.md`: Lighthouse móvil ≥ 90 en condiciones comparables, hero ≤ 250 KB, fuentes iniciales ≤ 250 KB, JavaScript propio 0 KB y sin layout shifts introducidos por el theme.
- **RNF-03 — Seguridad y privacidad:** no incluir secretos, datos locales, telemetría ni recursos remotos inesperados. Toda URL generada mediante PHP debe escaparse con la API de WordPress adecuada.
- **RNF-04 — Compatibilidad:** soportar WordPress 6.7+ y PHP 8.0+, además de Chrome, Firefox y Safari estables disponibles durante QA.
- **RNF-05 — Responsive:** no debe existir scroll horizontal ni pérdida de contenido desde 320 CSS px hasta desktop; el zoom a 200 % debe conservar lectura y operación.
- **RNF-06 — Mantenibilidad:** `front-page.html` ensambla y no duplica markup interno; cada pattern tiene responsabilidad única y slug estable.
- **RNF-07 — Portabilidad:** rutas de assets del theme no dependen del dominio, de la ubicación absoluta del proyecto ni de IDs de medios de una base de datos concreta.
- **RNF-08 — Evidencia:** toda afirmación de cumplimiento debe registrar commit, entorno, prueba y resultado en el PR o en `qa.md`.

## Contrato de contenido

`AGENTS.md` conserva el inventario verbatim completo y prevalece si una futura edición accidental de esta tabla introduce una discrepancia. Esta tabla define la unidad y jerarquía que debe verificar cada issue.

| Sección | Elementos obligatorios | Jerarquía principal | Issue |
|---|---|---|---:|
| Header | Logo “Vicunav”; Portafolio; Servicios; Comencemos; English | `header` + `nav` | Baseline / #12 |
| Hero | Eyebrow, H1, párrafo, “Ver servicios”, escena de escritorio | Único `h1` | #3 |
| Situaciones | H2 y ocho situaciones completas con check | `h2` + lista | #4 |
| Cómo ayudamos | Introducción con cuatro puntos y medio editorial; proceso 01–06; “Ver paquetes” | Dos `section`, cada una con `h2` | #5 |
| Testimonio | Eyebrow, cita de TatiPilates y atribución | `h2` visual o cita semántica según referencia | #6 |
| Resultados | Eyebrow, H2, subtítulo y cinco resultados | `h2` + lista | #7 |
| Debería sentirse | Eyebrow, H2, párrafo y “¡Hablemos!” | `h2` | #8 |
| Conoce a Mario | Eyebrow, H2, subtítulo y bio de tres párrafos | `h2` | #9 |
| Marcas | H2 y cinco logos locales | `h2` + imágenes | #33 |
| CTA final | H2, párrafo y “Hablemos sobre tu sitio web” | `h2` | #10 |
| Footer | Identidad, descripción, 3 columnas, audiencias, fit y legal | `footer` + headings internos | Baseline / #12 |

### Copy normativo por sección

Los siguientes textos deben aparecer sin paráfrasis:

- **Hero:** “Para profesionales independientes y negocios”; “Tu sitio web es el primer paso que tus clientes dan hacia ti”; “Sitios web profesionales para profesionales independientes y negocios que ofrecen servicios. Diseñados para generar confianza, comunicar con claridad lo que haces, aparecer en Google y en sistemas de IA, recibir reservas en línea, y convertir visitantes en clientes.”; “Ver servicios”.
- **Situaciones:** el título “¿Alguna de estas situaciones te describe?” y los ocho puntos numerados en `AGENTS.md`, en el mismo orden.
- **Cómo ayudamos:** “Cómo ayudamos”; “Tu Sitio Web, Sin el Estrés”; “Guiamos el proceso con claridad en cada paso”; los cuatro puntos introductorios; “Así funciona”; “Tu Sitio Web, Completamente Acompañado”; los pasos 01–06 completos de `AGENTS.md`; “Ver paquetes”.
- **Testimonio:** “Testimonio destacado”; “TatiPilates maneja ahora todo su negocio desde un solo lugar”; “- Tatiana Diaz, TatiPilates”.
- **Resultados:** “Los Resultados”; “Un Sitio Web del que Sientes Orgullo de Compartir”; “Porque sabes que va a:” y los cinco resultados de `AGENTS.md`.
- **Debería sentirse:** “Sin presiones, ni tácticas raras”; “Debería Sentirse Como Tú”; el párrafo completo de `AGENTS.md`; “¡Hablemos!”.
- **Conoce a Mario:** “Conoce a Mario”; “Construyendo sitios web desde 2016”; “Haciendo el proceso simple, del inicio al lanzamiento”; los tres párrafos completos de bio de `AGENTS.md`.
- **Marcas:** “Marcas con las que he trabajado” y los cinco logos locales de la referencia.
- **CTA final:** “¿Listo para un sitio web que realmente refleje tu trabajo y te ayude a crecer?”; el párrafo completo de `AGENTS.md`; “Hablemos sobre tu sitio web”.
- **Header y footer:** todo el contenido enumerado en las secciones “Header / Nav” y “Footer” de `AGENTS.md`.

## Escenarios

### Escenario 1: visita anónima en desktop

- **Dado** que el theme está activo y la portada usa la configuración estándar de WordPress,
- **cuando** una persona abre `https://vicunav-gutenberg.local/` a 1440×900,
- **entonces** ve todas las secciones en el orden aprobado, con contenido y composición equivalentes a la referencia y sin depender de Elementor.

### Escenario 2: navegación responsive

- **Dado** el mismo homepage,
- **cuando** se usa entre 320 CSS px y 768 px, con zoom o menú overlay,
- **entonces** el contenido refluye sin overflow, los controles permanecen alcanzables y el orden de lectura conserva la intención editorial.

### Escenario 3: edición en Gutenberg

- **Dado** un usuario con permisos de edición,
- **cuando** abre el Site Editor y previsualiza la portada,
- **entonces** WordPress reconoce templates, template parts y patterns sin bloques inválidos y la vista mantiene la intención del frontend.

### Escenario 4: carga sin terceros

- **Dado** un navegador sin caché,
- **cuando** carga el homepage,
- **entonces** fuentes e imágenes del theme se resuelven desde el sitio local, no hay JavaScript propio y no se solicitan assets de producción ni Google Fonts.

### Escenario 5: diferencia frente a la referencia

- **Dado** que QA detecta una diferencia,
- **cuando** no puede corregirse con bloques core y los tokens aprobados,
- **entonces** se documentan evidencia, limitación, impacto y alternativa; no se introduce una decisión de diseño silenciosa.

## Criterios de aceptación

- [ ] **AC-01:** la baseline `theme.json` + header + footer se carga sin errores y coincide con el inventario durante el QA integral.
- [ ] **AC-02:** el hero cumple RF-03–RF-08, RD-02–RD-10 y su contenido específico. Issue #3.
- [ ] **AC-03:** situaciones contiene exactamente los ocho puntos, semántica de lista y checks accesibles. Issue #4.
- [ ] **AC-04:** cómo ayudamos contiene su introducción de cuatro puntos, imagen editorial, eyebrow, H2, subtítulo, pasos 01–06 y CTA exactos. Issue #5.
- [ ] **AC-05:** el testimonio conserva cita, atribución y semántica apropiada. Issue #6.
- [ ] **AC-06:** resultados conserva eyebrow, título y copy exactos. Issue #7.
- [ ] **AC-07:** debería sentirse conserva H2, párrafo y CTA exactos. Issue #8.
- [ ] **AC-08:** conoce a Mario conserva eyebrow, títulos y tres párrafos, con assets locales accesibles cuando aplique. Issue #9.
- [ ] **AC-09:** la franja de marcas conserva el título y cinco logos locales; el CTA final conserva título, párrafo, enlace y fondo exactos y es operable por teclado. Issues #33 y #10.
- [ ] **AC-10:** `front-page.html` ensambla template parts y patterns en el orden RD-01 sin duplicación. Issue #11.
- [ ] **AC-11:** una comparación lado a lado confirma paridad visual sección por sección o documenta una limitación técnica real. Issue #12.
- [ ] **AC-12:** la matriz responsive y de navegadores termina sin overflow, pérdida de contenido ni controles inoperables. Issue #13.
- [ ] **AC-13:** la auditoría de accesibilidad no deja violaciones A/AA introducidas ni problemas bloqueantes de teclado, foco, semántica o reflow. Issue #14.
- [ ] **AC-14:** fuentes e imágenes cumplen los presupuestos y Lighthouse móvil alcanza el objetivo o registra una desviación reproducible frente a baseline. Issue #15.
- [ ] **AC-15:** Theme Check, revisión de seguridad, limpieza del repositorio, changelog, versión y evidencia final permiten declarar un release candidate sin tocar producción. Issue #16.
- [ ] **AC-16:** todos los sub-issues requeridos están cerrados, `qa.md` cubre AC-01–AC-15 y el issue padre #1 puede cerrarse.

## Assets y datos

| Asset | Estado inicial | Contrato |
|---|---|---|
| `assets/images/logo-dark.webp` | Presente | Logo local del header; validar dimensiones, propósito y nombre accesible. |
| Red Hat Display | TTF local + OFL | Convertir/subsetear a WOFF2 en #15 sin alterar métricas visuales. |
| Bodoni Moda | TTF local + OFL | Convertir/subsetear a WOFF2 en #15 sin alterar métricas visuales. |
| Gloock | TTF local + OFL | Mantener solo si el caso observado permanece en el clon; optimizar en #15. |
| Caveat | TTF local + OFL | Mantener solo para los acentos observados; optimizar en #15. |
| Imagen hero | Pendiente de #3 | Asset local equivalente autorizado; objetivo ≤ 250 KB, dimensiones intrínsecas y licencia/procedencia registradas. |
| Otras imágenes de secciones | Se identifican durante cada issue | Deben corresponder a la referencia, ser locales, optimizadas y tener `alt` contextual o vacío si son decorativas. |

No se copian datos de usuarios, formularios, analytics ni contenido privado. Producción se usa únicamente como referencia visual de solo lectura.

## Riesgos y supuestos

- **Riesgo:** los estilos globales guardados en la base de datos pueden ocultar diferencias respecto a los archivos. **Mitigación:** comparar frontend y Site Editor, revisar overrides y registrar la configuración usada.
- **Riesgo:** las métricas de las fuentes WOFF2 pueden variar frente a las TTF. **Mitigación:** #15 exige comparación visual antes/después y rollback a la baseline si cambia la composición.
- **Riesgo:** no disponer del asset original del hero. **Mitigación:** usar la excepción local equivalente ya autorizada y someterla a comparación/aprobación en #3 y #12.
- **Riesgo:** rutas absolutas del entorno local vuelven el theme no portable. **Mitigación:** usar rutas del theme y APIs de WordPress; buscar referencias a `/Users/` y al dominio local antes del PR.
- **Riesgo:** pequeñas diferencias de Gutenberg frente a Elementor. **Mitigación:** preferir bloques core; documentar solo limitaciones técnicas demostrables.
- **Riesgo:** navegación a páginas fuera del alcance devuelve contenido no migrado. **Mitigación:** conservar destinos aprobados; no migrar esas páginas dentro de Fase 1.
- **Supuesto:** Vicunav controla o puede licenciar los assets visibles que se incorporen localmente.
- **Supuesto:** el sitio vivo permanece como referencia durante QA, aunque nunca se modifica desde este proyecto.

## Preguntas abiertas

No hay preguntas abiertas que cambien el resultado de Fase 1. La selección concreta del asset local del hero es una decisión de implementación acotada por RD-08 y necesita aprobación visual antes de cerrar #3.

## Decisiones

| Fecha | Decisión | Motivo |
|---|---|---|
| 2026-07-20 | Tratar `AGENTS.md` como inventario verbatim normativo. | Evita duplicaciones divergentes y preserva el contenido aprobado. |
| 2026-07-20 | Mantener la excepción de asset local equivalente solo para el hero. | Está autorizada explícitamente en el inventario; no habilita un rediseño general. |
| 2026-07-25 | Usar diez patterns registrados y bloques core. | La auditoría visual recuperó la introducción de cómo ayudamos y la franja de marcas presentes en producción pero ausentes del inventario inicial. |
| 2026-07-20 | Mantener producción fuera de toda mutación. | La migración se desarrolla y valida en LocalWP. |
| 2026-07-20 | Separar optimización WOFF2 en #15. | Las TTF son baseline funcional; la conversión requiere medición y comparación visual propias. |
| 2026-07-20 | Corregir la baseline del header mediante #19 antes de aprobar el Hero. | La comparación directa demostró dimensiones, casing y selector de idioma distintos a producción; AC-01 no puede diferirse hasta el QA integral. |
| 2026-07-20 | Crear `front-page.html` con el Hero y ampliarlo incrementalmente en cada PR de sección. | Permite revisar `/` contra producción desde la primera sección y evita falsos resultados causados por `post-content` constrained; #11 conserva la verificación del ensamblaje completo. |
| 2026-07-20 | Corregir el footer mediante #21 antes del siguiente pattern. | La comparación directa demostró superficies, proporciones, tipografía y franja legal distintas; AC-01 exige reparar la baseline. |
| 2026-07-20 | Redirigir mediante #22 la edición de la página configurada como portada a `vicunav//front-page`. | El editor de la página estática muestra un título y contenido que la plantilla no renderiza; el Site Editor es el lienzo canónico del block theme. |
