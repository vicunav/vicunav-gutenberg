# Spec: página de Contacto

Issue padre: #69<br>
Estado: Blocked by decision<br>
Owner: @mariovicunadev<br>
Última actualización: 2026-07-28

## Problema

La página de Contacto todavía depende de Elementor Pro para presentación,
validación, entrega y reCAPTCHA. El block theme no dispone de una solución de
formularios aprobada.

## Resultado esperado

`/contacto/` reproduce la referencia con un template FSE editable, conserva los
ocho campos y ofrece envío accesible y seguro mediante una responsabilidad
externa al theme.

## Alcance

- introducción editorial;
- formulario de ocho campos;
- estados requerido, inválido, envío, error y éxito;
- protección antispam;
- bloque “Qué pasa después”;
- template, ruta del editor y QA responsive.

## Fuera de alcance

- implementar entrega, almacenamiento, correo o CAPTCHA dentro del theme;
- enviar datos de prueba al formulario de producción;
- rediseñar el contenido;
- resolver la arquitectura multidioma;
- modificar header o footer compartidos.

## Requisitos

### Funcionales

- RF-01: `/contacto/` responde `200`.
- RF-02: el formulario conserva campos, tipos, opciones y requeridos descritos
  en `content-inventory.md`.
- RF-03: la solución aprobada valida, entrega y protege envíos sin exponer
  secretos al cliente.
- RF-04: éxito y error ofrecen mensajes localizables y recuperables.
- RF-05: el acceso administrativo abre `page-contacto` en el Editor del sitio.
- RF-06: el título administrativo no se renderiza antes del diseño.

### Contenido y diseño

- RD-01: el copy coincide con `content-inventory.md`.
- RD-02: la página reutiliza la textura cálida ya almacenada localmente.
- RD-03: escritorio usa dos columnas para los seis primeros controles y ancho
  completo para textareas y submit.
- RD-04: móvil usa una columna y controles de ancho completo.
- RD-05: “Qué pasa después” conserva sus dos expectativas de respuesta.

### No funcionales

- RNF-01 Accesibilidad: un H1, labels programáticas, indicación textual de
  requeridos, foco visible, errores asociados y WCAG 2.2 AA.
- RNF-02 Seguridad: nonce, sanitización, escaping, rate limiting o antispam y
  entrega fuera del theme.
- RNF-03 Privacidad: no persistir datos sin una decisión explícita y documentar
  cualquier tercero que reciba datos.
- RNF-04 Rendimiento: cero hotlinks y carga de CAPTCHA solo donde se necesite.
- RNF-05 Compatibilidad: WordPress 6.7+, PHP 8.0+ y Site Editor.

## Criterios de aceptación

- [x] AC-01: baseline e inventario cubren desktop y móvil.
- [x] AC-02: campos, opciones, requeridos y dependencia funcional están
  documentados.
- [ ] AC-03: la solución de formularios está aprobada en #72.
- [ ] AC-04: composición y copy equivalen a producción.
- [ ] AC-05: formulario funcional, accesible, seguro y localizable.
- [ ] AC-06: `page-contacto.html` es la fuente canónica.
- [ ] AC-07: reflow sin overflow entre 320 px y desktop.
- [ ] AC-08: Site Editor, consola y quality gates aprobados.

## Riesgos

- Elementor entrega mensajes de éxito/error por AJAX y no publica su copy en
  el DOM inicial. No se envió el formulario de producción para descubrirlos.
- La selección de plugin puede afectar markup, estilos, localización,
  privacidad y mantenimiento.
- reCAPTCHA v3 envía datos a un tercero; #72 debe valorar alternativas y
  consentimiento.

## Decisiones

| Fecha | Decisión | Motivo |
|---|---|---|
| 2026-07-28 | Corregir el título principal de H2 a H1 | Semántica sin cambio visual |
| 2026-07-28 | No implementar envío en el theme | Separación de responsabilidades y seguridad |
| 2026-07-28 | No enviar el formulario de producción durante QA | Evitar mensajes reales y efectos externos |
