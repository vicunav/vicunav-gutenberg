# ADR 0001: Contact Form 7 y Cloudflare Turnstile

Estado: Accepted<br>
Fecha: 2026-07-28<br>
Issue: #72

## Contexto

La página de Contacto necesita render, validación, entrega de correo y
protección antispam. Esas responsabilidades no pertenecen al theme y WordPress
core no ofrece un bloque de formulario funcional que cubra el contrato.

La solución debe admitir español e inglés, integrarse con el Editor del sitio,
mantener labels y errores accesibles, ser portable entre entornos y evitar
almacenar datos personales sin una política de retención aprobada.

## Drivers de decisión

- superficie funcional y de ataque mínima;
- compatibilidad con WordPress 7.0.2 y PHP 8.0+;
- bloque oficial para Gutenberg;
- mensajes y formularios localizables;
- antispam mantenido sin lógica propia;
- configuración exportable;
- ausencia de persistencia por defecto.

## Opciones consideradas

1. Contact Form 7 con su integración nativa de Turnstile.
2. Fluent Forms con Turnstile y almacenamiento de entradas.
3. Endpoint, validación y correo implementados por el theme.
4. Conservar el formulario de Elementor Pro.

La opción 2 cubre el caso, pero añade almacenamiento y una superficie mayor de
funciones que no necesita este formulario. Las opciones 3 y 4 contradicen la
arquitectura del proyecto.

## Decisión

Usar Contact Form 7 `6.1.6` y su integración nativa con Cloudflare Turnstile.

- El theme controla únicamente composición y estilos.
- Contact Form 7 controla campos, validación, mensajes y entrega.
- Turnstile controla la comprobación antispam.
- No se instala Flamingo ni otro almacenamiento de entradas.
- Se mantienen formularios separados para español e inglés.
- La configuración se exporta como contenido `wpcf7_contact_form` y se
  acompaña con un runbook reproducible.
- Las claves reales de Turnstile viven fuera del repositorio. LocalWP usa
  exclusivamente las claves oficiales de prueba.
- El bloque selector de Contact Form 7 es una excepción aprobada a la
  preferencia por bloques core.

## Consecuencias

### Positivas

- no se incorpora lógica sensible al theme;
- no se conservan datos personales en WordPress;
- el formulario continúa funcionando sin JavaScript, aunque sin AJAX;
- Turnstile sustituye reCAPTCHA sin puzzles visuales;
- formulario, correo y mensajes pueden exportarse con WordPress.

### Negativas

- la entrega depende de `wp_mail` y de la operación SMTP del entorno;
- un correo perdido no tiene copia local;
- producción necesita credenciales de Cloudflare;
- el template depende de que Contact Form 7 permanezca activo.

El almacenamiento o un proveedor transaccional futuro requieren un issue y una
decisión de privacidad propios.

## Plan de validación y rollback

1. Instalar y activar Contact Form 7 solo en LocalWP.
2. Configurar Turnstile con claves oficiales de prueba.
3. Crear el formulario español y exportar su configuración sin secretos.
4. Probar validación, Turnstile, envío y recepción en Mailpit.
5. Verificar que no exista almacenamiento de entradas.
6. Repetir la configuración para inglés cuando se implemente esa versión.

Rollback: retirar el bloque consumidor y desactivar Contact Form 7. Antes de
desinstalar, exportar los formularios; no hay entradas persistidas que migrar.

## Referencias

- https://wordpress.org/plugins/contact-form-7/
- https://contactform7.com/getting-started-with-contact-form-7/
- https://contactform7.com/turnstile-integration/
- https://contactform7.com/faq/how-can-i-export-import-contact-form-data/
- https://contactform7.com/configuration-errors/
