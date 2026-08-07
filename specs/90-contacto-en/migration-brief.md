# Migration brief: Contacto en inglés

Issue: #90

## Fuente y límites

- fuente normativa: `specs/69-contacto/content-inventory.md`;
- referencia visual: Contacto ES local aprobada;
- ADR funcional: `docs/adr/0001-contact-form-7-y-turnstile.md`;
- ruta: `/en/contact/`;
- locale: `en_US`;
- relación: `/contacto/` con `/en/contact/`.

## Reutilización

La variante EN usa el mismo pattern, CSS, fondo, tokens y template parts. El
formulario es independiente porque CF7 administra locale, campos, mensajes y
correo como propiedades del post de formulario.

## Riesgos y controles

- datos personales: usar únicamente datos ficticios locales y no persistir;
- secretos: comprobar presencia de configuración, nunca imprimir valores;
- Turnstile: reutilizar las claves oficiales de prueba ya configuradas en LocalWP;
- envío: verificar Mailpit local, nunca producción;
- regresión: confirmar formulario ES y scope de assets fuera de Contacto.
