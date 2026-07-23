# AGENTS.md — Vicunav: Migración Elementor → Gutenberg (Fase 1: Clon exacto)

## Contexto del proyecto

Este proyecto migra el home de vicunav.com de Elementor a un **block theme nativo de Gutenberg (Full Site Editing)**. Es la primera pieza del portafolio técnico de Mario Vicuña — el repo debe leerse como trabajo profesional para otros devs, no como una conversión rápida.

**Fase 1 (este documento): clon exacto.** Estructura, orden de secciones, copy, colores, tipografía e imágenes deben ser 1:1 al sitio actual — solo re-implementados nativamente en Gutenberg. No se toma NINGUNA decisión de diseño nueva en esta fase. Eso es deliberado: aísla la mecánica de conversión de las decisiones de rediseño, que vienen después en la Fase 2 (fuera de alcance de este documento).

**Alcance:** solo el homepage (`front-page.html`). Servicios, portafolio y contacto son fases posteriores.

**Entorno:** LocalWP, sitio local de WordPress. No tocar producción (Elementor sigue viviendo en vicunav.com hasta el swap final, que no es parte de esta fase).

---

## Convenciones técnicas no negociables

1. **Design tokens solo en `theme.json`.** Ningún color o fuente hardcodeado en bloques individuales o CSS suelto. Todo color/tipografía se referencia desde las variables definidas en `theme.json` (`var:preset|color|...`, `var:preset|font-family|...`).
2. **Patterns antes que bloques custom.** Cada sección del home es un pattern (`/patterns/*.php` registrado, con `Block Types` y `Slug` en el header). No se construye ningún bloque custom en esta fase — todo se resuelve con bloques core (Group, Columns, Heading, Paragraph, Image, Buttons, Details/FAQ si aplica).
3. **Estructura real de theme**, no una página larga:
   - `theme.json` — tokens
   - `templates/front-page.html` — ensambla los patterns en orden
   - `parts/header.html`, `parts/footer.html` — template parts
   - `patterns/*.php` — un archivo por sección
4. **Copy y jerarquía de encabezados exactos** — ver inventario de contenido abajo, es texto real extraído del sitio en vivo, no aproximado. No parafrasear.
5. **Git commit por sección terminada**, no un solo commit al final.
6. **Sin animaciones/efectos de Elementor** (fade-ins por scroll, parallax) — se omiten en esta fase. Si hace falta reintroducir algo similar, se evalúa en Fase 2 con herramientas nativas de bloques, no ahora.

---

## Design tokens — `theme.json` (valores reales, extraídos del sitio en vivo)

### Colores (Elementor Global Colors → `settings.color.palette`)

| Slug sugerido | Rol original | Hex |
|---|---|---|
| `primary` | Primary | `#090909` |
| `secondary` | Secondary | `#F7F0ED` |
| `text` | Text | `#222222` |
| `accent` | Accent | `#444444` |
| `neutral-100` | — | `#FFFCFB` |
| `neutral-200` | — | `#F7F3EE` |
| `neutral-300` | — | `#F0E8DE` |
| `neutral-400` | — | `#DFC4A5` |
| `neutral-500` | — | `#CDAF8C` |
| `neutral-600` | — | `#B88D5C` |
| `neutral-700` | — | `#937049` |
| `neutral-800` | — | `#493824` |
| `neutral-900` | — | `#372A1B` |

### Tipografía (Elementor Global Typography → `settings.typography.fontFamilies`)

| Slug sugerido | Fuente | Uso observado |
|---|---|---|
| `body` | Red Hat Display | Cuerpo, UI, nav, botones |
| `heading` | Bodoni Moda | H2 principales, la mayoría de los títulos de sección |
| `accent-serif` | Gloock | Uso puntual (un caso detectado) |
| `handwritten` | Caveat | Toques manuscritos/acento |

Nota: ambas fuentes (Bodoni Moda, Red Hat Display, Gloock, Caveat) deben cargarse como `fontFace` en `theme.json` (Google Fonts o self-hosted — preferir self-hosted por performance, es buena práctica y buena señal para el repo).

---

## Inventario de contenido — Home (orden real, copy verbatim)

### Header / Nav
- Logo: "Vicunav"
- Menú: Portafolio · Servicios · Comencemos
- Selector de idioma: English

### 1. Hero
- Eyebrow: "Para profesionales independientes y negocios"
- H1: "Tu sitio web es el primer paso que tus clientes dan hacia ti"
- Párrafo: "Sitios web profesionales para profesionales independientes y negocios que ofrecen servicios. Diseñados para generar confianza, comunicar con claridad lo que haces, aparecer en Google y en sistemas de IA, recibir reservas en línea, y convertir visitantes en clientes."
- Botón: "Ver servicios"
- Imagen de fondo: escena de escritorio (vela, libreta, taza) — reemplazar por asset local equivalente

### 2. "¿Alguna de estas situaciones te describe?" (lista de 8 puntos, cada uno con ícono de check)
1. Tu sitio web no refleja la calidad real de tu trabajo. Se ve más genérico que lo que realmente ofreces.
2. Explicar tus servicios por escrito es más difícil de lo que parece. Nunca sabes bien qué decir ni cómo ordenarlo.
3. Tus clientes ideales no te encuentran en Google, y cuando alguien le pregunta a ChatGPT por alguien como tú, no apareces.
4. La parte técnica, el dominio, el hosting, las actualizaciones, te quita tiempo que deberías invertir en tu negocio.
5. La gente llega a tu sitio pero no te escribe. Algo los frena, y no sabes exactamente qué.
6. Quieres algo profesional y que genere confianza, pero que no suene corporativo ni desconectado de lo que haces.
7. Tus clientes aún tienen que llamarte o escribirte para agendar. No hay una forma clara de reservar desde tu sitio.
8. Usas demasiadas herramientas separadas para gestionar tu negocio y nada está conectado.

### 3A. "Cómo ayudamos" — Introducción
- Eyebrow: "Cómo ayudamos"
- H2: "Tu Sitio Web, Sin el Estrés"
- Subtítulo: "Guiamos el proceso con claridad en cada paso"
- Puntos:
  1. "Escribimos - Para que nunca tengas que adivinar qué decir. El texto suena como tú y comunica claramente cómo ayudas."
  2. "Diseñamos - Para que no te pierdas en decisiones interminables. Definimos juntos una dirección visual que refleje tu negocio."
  3. "Configuramos - Para que tus clientes puedan reservar o contactarte directamente desde tu sitio, sin pasar por WhatsApp o llamadas."
  4. "Apoyamos - Para que no tengas que manejar la parte técnica solo. Estamos contigo antes, durante y después del lanzamiento."
- Imagen editorial: composición vertical “How Vicunav helps”.

### 3B. "Así funciona" — Proceso
- Eyebrow: "Así funciona"
- H2: "Tu Sitio Web, Completamente Acompañado"

| # | Título | Descripción |
|---|---|---|
| 01 | Tus textos, listos | Ponemos en palabras lo que haces para que nunca te enfrentes a una página en blanco. El copy suena auténtico y explica con claridad cómo ayudas. |
| 02 | La dirección visual de tu sitio | Definimos juntos la estética: colores, tipografía y estructura. Profesional, coherente y fiel a tu negocio desde el inicio. |
| 03 | Tu sitio, diseñado y desarrollado | Construimos tu sitio en WordPress. Estable, rápido, fácil de navegar, y optimizado para aparecer en Google y en sistemas de IA. |
| 04 | Tu sitio, listo para ser encontrado | Tu sitio sale estructurado para que Google y los sistemas de IA entiendan qué haces, a quién ayudas y dónde estás. Sin trucos, con claridad. |
| 05 | Tus herramientas, configuradas | Sistema de reservas, formularios de contacto, o las herramientas que tu negocio necesite, configuradas para que todo funcione desde el primer día. |
| 06 | Soporte cuando lo necesitas | Si necesitas cambiar algo después, no estás solo. Podemos ayudarte con ajustes y actualizaciones a medida que tu negocio crece. |

- Botón: "Ver paquetes"

### 4. Testimonio destacado
- Eyebrow: "Testimonio destacado"
- Cita/headline: "TatiPilates maneja ahora todo su negocio desde un solo lugar"
- Atribución: "- Tatiana Diaz, TatiPilates"

### 5. "Los Resultados"
- Eyebrow: "Los Resultados"
- H2: "Un Sitio Web del que Sientes Orgullo de Compartir"
- Subtítulo: "Porque sabes que va a:"
- Resultados:
  1. "Reflejar tu trabajo con claridad y honestidad"
  2. "Atraer a las personas correctas para tu negocio"
  3. "Aparecer cuando te buscan en Google y en sistemas de IA"
  4. "Permitir que tus clientes reserven directamente, sin pasos intermedios"
  5. "Funcionar con las herramientas que ya usas o las que configuremos juntos"

### 6. "Debería Sentirse Como Tú"
- Eyebrow: "Sin presiones, ni tácticas raras"
- H2: "Debería Sentirse Como Tú"
- Párrafo: "Si ofreces un servicio, lo último que quieres es un sitio web que se sienta agresivo o de ventas. Eso simplemente no es como operas. Tu sitio debería sentirse como lo que eres: claro, honesto, y una extensión natural de cómo ya apoyas a las personas que trabajan contigo."
- Botón: "¡Hablemos!"

### 7. "Conoce a Mario"
- Eyebrow: "Conoce a Mario"
- H2: "Construyendo sitios web desde 2016"
- Subtítulo: "Haciendo el proceso simple, del inicio al lanzamiento"
- Bio (3 párrafos):
  1. "Hola, soy Mario. Llevo más de nueve años diseñando y desarrollando sitios web para negocios y profesionales de servicios. Con el tiempo entendí algo que se repite mucho: hay profesionales muy buenos en lo que hacen que son casi invisibles en internet. No porque su trabajo no valga, sino porque su presencia digital no los representa bien."
  2. "Eso fue lo que me llevó a crear Vicunav. Un estudio enfocado en diseñar sitios web claros y profesionales para coaches, consultores, terapeutas, formadores y cualquier profesional cuyo negocio se basa en el servicio que ofrece. Sin marketing agresivo, sin diseños genéricos, sin que tengas que resolverlo todo solo."
  3. "Si tu trabajo importa, tu sitio web debería reflejarlo. Y las personas correctas deberían poder encontrarte, tanto en Google como cuando le preguntan a una IA."

### 8. "Marcas con las que he trabajado"
- H2: "Marcas con las que he trabajado"
- Cinco logos del sitio de referencia, almacenados localmente y presentados como una fila responsive.

### 9. CTA final
- H2: "¿Listo para un sitio web que realmente refleje tu trabajo y te ayude a crecer?"
- Párrafo: "Si buscas un sitio claro y profesional, con reservas en línea y las herramientas que tu negocio necesita, podemos empezar con una conversación sencilla."
- Botón: "Hablemos sobre tu sitio web"

### 10. Footer
- Logo + tagline: "Vicunav — Diseño web profesional para profesionales independientes y negocios."
- Descripción: "Sitios web y herramientas para profesionales independientes y negocios de servicios. Diseñados para generar confianza, aparecer en Google y en sistemas de IA, recibir reservas en línea, y funcionar bien desde el primer día."
- Columna "Explorar": Inicio · Servicios · Portfolio · Comencemos
- Columna "Servicios": Paquete Esencial · Paquete Completo · Plan de Mantenimiento
- Columna "Contáctanos": Email: hello@vicunav.com · "Respuesta en 1 a 2 días hábiles" · botón "HABLEMOS"
- Bloque "Con quiénes trabajamos" (3 grupos):
  - **Salud, bienestar y fitness:** Terapeutas y psicólogos, Médicos y especialistas, Nutricionistas y dietistas, Estudios de pilates y yoga, Entrenadores personales y coaches, Profesionales de bienestar
  - **Hospitalidad y turismo:** Hoteles y hospedajes, Restaurantes y cafeterías, Agencias de viajes, Tour operators y guías turísticos, Spas y centros de tratamiento, Experiencias y actividades turísticas
  - **Formación y servicios profesionales:** Formadores y educadores, Consultores y asesores, Profesionales independientes, Pequeños negocios de servicios
- Criterio de fit: "Si tu negocio depende de que las personas te encuentren, entiendan lo que ofreces, y puedan reservar o contactarte con facilidad, trabajamos contigo."
- Legal: "© 2026 Vicunav. Todos los derechos reservados." · Privacy Policy · Terms and Conditions · "Vicunav es un estudio de diseño web, no un proveedor de salud."

---

## Workflow de build (orden sugerido)

1. `theme.json` completo (colores + tipografía) — primero, antes de cualquier pattern.
2. `parts/header.html`
3. `parts/footer.html`
4. Patterns en el orden del inventario: hero → situaciones → cómo-ayudamos-intro → cómo-ayudamos/proceso → testimonio → resultados → deberia-sentirse-como-tu → conoce-a-mario → marcas → cta-final
5. `templates/front-page.html` ensamblando todo
6. Verificación visual contra vicunav.com en vivo, sección por sección
7. Commit por cada paso completado

## Definición de "hecho" para esta fase

El home en LocalWP debe verse — estructura, copy, colores, tipografía — equivalente al vicunav.com actual, navegando ambos lado a lado. Cualquier diferencia debe ser justificada (limitación técnica real), no una decisión de diseño silenciosa.

## Fuera de alcance (Fase 2, no ahora)

Nueva paleta, nueva tipografía, nuevas imágenes de fondo, ajustes de mensaje para nicho ampliado. No adelantar nada de esto en la Fase 1.
