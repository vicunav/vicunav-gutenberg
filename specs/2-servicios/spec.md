# Especificación: página de Servicios

Epic: #50  
Referencia: `https://vicunav.com/servicios/`  
Entorno objetivo: `https://vicunav-gutenberg.local/servicios/`  
Estado: aprobado para implementación local

## Objetivo

Migrar la página de Servicios de Elementor a una plantilla nativa de Gutenberg, manteniendo paridad visual y de contenido con la referencia vigente. La entrega reutiliza el sistema de diseño consolidado del homepage, conserva header y footer compartidos, usa únicamente bloques core y almacena todos los recursos en el theme.

## Alcance

- Plantilla `templates/page-servicios.html` sin título de entrada visible.
- Nueve patterns registrados y editables: hero, dos paquetes, beneficios, proceso, mantenimiento, opciones adicionales, FAQ y CTA final.
- Ruta local publicada en `/servicios/` y acceso directo desde el Editor del sitio.
- Assets propios localizados, optimizados, documentados y sin hotlinks.
- QA estructural, visual, responsive, accesible, de rendimiento y seguridad.
- Header y footer existentes se reutilizan sin bifurcarlos.

## Fuera de alcance

- Rediseño, reescritura comercial o modificación silenciosa de precios.
- Checkout, reservas, formularios o lógica de pago.
- Animaciones heredadas de Elementor.
- Cambios en producción o staging.
- Bloques custom, JavaScript propio o dependencias nuevas.

## Arquitectura

Cada sección se implementa como un pattern PHP registrado con `Block Types`, `Slug`, `Categories` y `Viewport Width`. La plantilla ensambla referencias a esos patterns entre los template parts compartidos. El árbol editable usa bloques core y `templateLock: contentOnly` en el contenedor de cada sección para preservar la composición sin bloquear el contenido.

Los valores compartidos de color, tipografía y espacio proceden de presets de `theme.json`. El CSS queda limitado a composición responsive, encuadres, texturas, decoraciones y estados que Gutenberg no expresa de forma portable. No se crea un token por cada medición local: solo se añade uno cuando tiene significado reutilizable en más de una sección.

## Inventario funcional

El copy literal, su orden y sus destinos se fijan en [`content-inventory.md`](content-inventory.md). El orden obligatorio es:

1. Hero.
2. Paquete Sitio Web Esencial.
3. Paquete Sitio Web Completo.
4. Incluido en cada proyecto.
5. Nuestro proceso.
6. Cuidado continuo.
7. Opciones adicionales.
8. Preguntas frecuentes.
9. CTA final.

## Requisitos funcionales

- **RF-01:** `/servicios/` responde 200 y aplica `page-servicios.html`.
- **RF-02:** existe un solo `h1`; las secciones principales usan `h2` y sus elementos internos mantienen una jerarquía consecutiva.
- **RF-03:** `Ver paquetes` apunta a `#packages` y el ancla existe.
- **RF-04:** los CTA de conversión apuntan a `/contacto/`.
- **RF-05:** las 17 preguntas se implementan con `core/details`, son utilizables con teclado y no dependen de JavaScript.
- **RF-06:** todos los patterns aparecen en el Editor del sitio y el acceso de edición de la página abre su template directamente.
- **RF-07:** las imágenes informativas tienen `alt` contextual; fondos y adornos son ignorados por tecnologías de asistencia.
- **RF-08:** no existen hotlinks, secretos, rutas locales ni HTML dinámico sin escape.

## Requisitos no funcionales

- **RNF-01 — Fidelidad:** estructura, copy, paleta, familias, ritmo, imágenes y composición equivalentes a producción en 390, 768 y 1440 px.
- **RNF-02 — Edición:** contenido editable con bloques core y bloqueos de contenido, sin HTML arbitrario como modelo de edición.
- **RNF-03 — Rendimiento:** WebP local, dimensiones intrínsecas, lazy loading bajo el pliegue y precarga limitada al recurso LCP de Servicios.
- **RNF-04 — Accesibilidad:** WCAG 2.2 AA, foco visible, orden lógico, contraste y reflow a 320 px.
- **RNF-05 — Seguridad:** WordPress Coding Standards, escapes contextuales y cero recursos remotos de ejecución.
- **RNF-06 — Mantenibilidad:** un commit por issue, documentación en español y reutilización del sistema existente antes de añadir presets.

## Criterios de aceptación

- **AC-01:** baseline de producción, inventario literal y procedencia de assets documentados.
- **AC-02:** hero fiel, responsive y con CTA/ancla correctos.
- **AC-03:** paquete Esencial completo, con listas, precio, plazo, CTA y mantenimiento.
- **AC-04:** paquete Completo completo, con listas, precio, plazo, CTA y mantenimiento.
- **AC-05:** ocho beneficios presentes en el orden y con sus imágenes locales.
- **AC-06:** cinco pasos del proceso presentes en el orden y con composición editorial equivalente.
- **AC-07:** mantenimiento contiene precio, descripción y ocho prestaciones.
- **AC-08:** opciones adicionales contiene tres tarjetas, precios y descripciones literales.
- **AC-09:** FAQ contiene exactamente 17 preguntas y todas sus respuestas.
- **AC-10:** CTA final, template, ruta local y Editor del sitio funcionan sin mostrar el título de la entrada.
- **AC-11:** QA integral pasa sin defectos bloqueantes ni diferencias visuales silenciosas.
- **AC-12:** `composer qa`, validación WordPress, revisión de enlaces, consola y presupuesto de assets pasan sobre el commit candidato.

## Definition of Done

- Issues #51–#61 implementados y trazables a commits atómicos.
- Pull request enlazado al epic #50 y listo para revisión.
- Worktree limpio después de commit y push.
- Sitio local sincronizado por el symlink existente.
- Producción y staging no modificados.
