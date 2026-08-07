# Spec: experiencia multidioma ES/EN

Issue padre: #86

Estado: Completed

Owner: @vicunav

Última actualización: 2026-08-03

## Problema

Las páginas españolas aprobadas no tienen una experiencia inglesa equivalente
dentro del block theme. Implementar solo templates ingleses dejaría sin resolver
locale, relaciones, URLs y navegación entre traducciones; implementar esas
responsabilidades dentro del theme dañaría su portabilidad.

## Resultado esperado

Una persona puede recorrer Home, Servicios y Contacto en español o inglés,
cambiar a la traducción equivalente y editar cada composición con Gutenberg.
El sistema conserva las URLs aprobadas, el locale correcto y los contratos de
accesibilidad, rendimiento, seguridad y privacidad existentes.

## Alcance

- Polylang Free `3.8.6` configurado de forma reproducible en LocalWP.
- Español predeterminado sin prefijo e inglés bajo `/en/`.
- Selector ES/EN accesible en la navegación compartida.
- Home, Servicios y Contacto en inglés desde la verdad española aprobada.
- Formulario CF7 inglés independiente con Turnstile y sin persistencia.
- QA integral del sistema ES/EN y regresión de las páginas españolas.

## Fuera de alcance

- modificar o desplegar en producción;
- traducir Portafolio;
- traducción automática o servicios externos;
- Polylang Pro;
- animaciones heredadas de Elementor;
- almacenar mensajes de formulario en WordPress.

## Requisitos

### Funcionales

- RF-01: cada página incluida tiene una relación ES/EN explícita.
- RF-02: el selector lleva a la traducción equivalente cuando existe.
- RF-03: el documento, las APIs de WordPress y el formulario usan el locale
  activo.
- RF-04: las rutas inglesas coinciden con el contrato de `docs/MULTILINGUAL.md`.
- RF-05: desactivar Polylang no impide renderizar el theme español.

### Contenido y diseño

- RD-01: el copy inglés se adapta desde inventarios españoles aprobados.
- RD-02: orden, jerarquía, assets y composición no se reinterpretan durante la
  traducción.
- RD-03: tokens, patterns y componentes existentes se reutilizan antes de crear
  variantes.
- RD-04: header, footer y selector se perciben como un sistema coherente en
  ambos idiomas.

### No funcionales

- RNF-01 Accesibilidad: WCAG 2.2 AA, teclado, foco, reflow, idioma declarado y
  nombres accesibles.
- RNF-02 Rendimiento: no exceder los budgets de `docs/PERFORMANCE.md`; cargar
  assets de plugins solo donde exista un consumidor.
- RNF-03 Seguridad/privacidad: sin secretos, traducción remota ni persistencia
  de formularios; APIs públicas y escaping de WordPress.
- RNF-04 Compatibilidad: WordPress 6.7+, PHP 8.0+ y frontend/Site Editor.

## Escenarios

### Escenario 1: cambiar a la traducción equivalente

- Dado: una persona visita una página española con traducción publicada.
- Cuando: activa English en el selector.
- Entonces: llega a la ruta inglesa relacionada y el documento declara el
  locale inglés.

### Escenario 2: editar sin título administrativo

- Dado: una persona con capacidad de edición abre el template inglés.
- Cuando: usa el Editor del sitio.
- Entonces: ve la composición directa, sin título administrativo duplicado ni
  bloques inválidos.

### Escenario 3: enviar Contacto en inglés

- Dado: Turnstile y CF7 están configurados en LocalWP.
- Cuando: se completa correctamente el formulario inglés.
- Entonces: Mailpit recibe el mensaje, la interfaz responde en inglés y
  WordPress no almacena la entrada.

## Criterios de aceptación

- [x] AC-01: infraestructura y selector cumplen #87.
- [x] AC-02: Home EN cumple #88.
- [x] AC-03: Servicios EN cumple #89.
- [x] AC-04: Contacto EN y su formulario cumplen #90.
- [x] AC-05: QA integral y regresión española cumplen #91.
- [x] AC-06: documentación, evidencia y handoff identifican estado y rollback.

## Assets y datos

No se incorporan datos privados. Cada página hija reutiliza assets locales y
registra cualquier recurso nuevo en `assets/images/SOURCES.md`. Los inventarios
bilingües se crean dentro del spec del issue de página correspondiente.

## Riesgos y supuestos

- Riesgo: los cambios editoriales guardados en base de datos pueden ocultar la
  fuente versionada; se detectan antes de comparar.
- Riesgo: un selector sin traducción puede llevar a una página incorrecta; #87
  debe definir su estado antes de integrarlo.
- Supuesto: el locale inglés exacto se decide en #87 antes de crear contenido.

## Preguntas abiertas

Ninguna que bloquee el inicio de #87. Las decisiones locales de cada página se
resuelven en su issue antes del markup.

## Decisiones

| Fecha | Decisión | Motivo |
|---|---|---|
| 2026-08-03 | Polylang Free `3.8.6` | ADR 0002 y aprobación explícita en #85 |
| 2026-08-03 | Fuente inglesa: inventarios españoles | El contenido español es la verdad aprobada |
| 2026-08-03 | Ejecución secuencial #87–#91 | Reduce deriva y conserva gates por entrega |
| 2026-08-06 | `page-home` sustituye `front-page` solo para Home EN | WordPress prioriza la jerarquía de portada sobre el template asignado a la traducción |
