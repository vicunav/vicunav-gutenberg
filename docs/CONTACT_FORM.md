# Formulario de Contacto

Decisión: [ADR 0001](adr/0001-contact-form-7-y-turnstile.md)

## Dependencia

- Contact Form 7 `6.1.6`.
- Cloudflare Turnstile mediante la integración incluida en el plugin.
- Sin Flamingo ni almacenamiento de entradas.

El plugin se instala en WordPress, no dentro del theme ni del ZIP de release.

## Configuración reproducible

Las fuentes versionadas son `config/contact-form-7/contacto-es.json` y
`config/contact-form-7/contact-en.json`. El script `bin/setup-contacto.php`
crea o actualiza ambos formularios por título y garantiza que exista la página
vacía `/contacto/`. `bin/setup-polylang.php` crea `/en/contact/`, le asigna el
template inglés y relaciona ambas páginas.

El pattern usa el bloque core Shortcode. `inc/dependencies.php` ejecuta
únicamente shortcodes que comienzan con `[contact-form-7 ` porque los patterns
incluidos directamente por un block template no atraviesan `the_content`.
Esta integración no asume validación ni entrega: solo conecta el bloque FSE con
la API pública del plugin.

`inc/dependencies.php` también retira CSS, validación JavaScript y Turnstile
fuera de las páginas gestionadas `contacto` y `contact`. Un formulario nuevo en
otro slug debe ampliar explícitamente ese contrato.

```bash
wp plugin install contact-form-7 --version=6.1.6 --activate
wp eval-file wp-content/themes/vicunav/bin/setup-polylang.php
wp eval-file wp-content/themes/vicunav/bin/setup-contacto.php
```

Para LocalWP se pueden pasar las claves oficiales de prueba de Turnstile como
variables de entorno. El script no imprime ni persiste claves en el
repositorio:

```bash
VICUNAV_TURNSTILE_SITE_KEY='<site-key-de-prueba>' \
VICUNAV_TURNSTILE_SECRET_KEY='<secret-key-de-prueba>' \
wp eval-file wp-content/themes/vicunav/bin/setup-contacto.php
```

Las claves reales se configuran en **Contacto → Integración → Turnstile** y
nunca se copian al repo, issues, logs o evidencias.

## Entrega

Contact Form 7 usa `wp_mail`. LocalWP intercepta las pruebas en Mailpit. Antes
de producción se debe comprobar el proveedor SMTP, SPF, DKIM, DMARC y una
entrega real controlada.

Cada idioma usa un post CF7 independiente con su locale, campos, mensajes y
correo. Ambas configuraciones usan:

- sender generado para el dominio actual mediante `wordpress@{site_domain}`;
- recipient `hello@vicunav.com`;
- `Reply-To` con el correo de la persona;
- texto plano y escaping gestionado por Contact Form 7;
- `do_not_store: true` como defensa adicional si se instala almacenamiento en
  el futuro.

## Privacidad y rollback

WordPress no conserva los mensajes. Cloudflare recibe las señales necesarias
para verificar el token de Turnstile; esto debe reflejarse en la política de
privacidad antes de producción.

Para rollback, retirar el bloque consumidor y desactivar Contact Form 7.
Exportar primero los formularios desde **Herramientas → Exportar** si existen
personalizaciones realizadas en el administrador.
