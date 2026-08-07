# Spec: Contacto en inglés

Issue: #90

Estado: Approved

## Resultado

Publicar `/en/contact/`, relacionada con `/contacto/`, y provisionar un
formulario Contact Form 7 independiente en inglés conforme al ADR 0001.

## Alcance

- página `Contact` con locale `en_US` y template `page-contact-en`;
- variante EN del pattern español de Contacto;
- formulario CF7 independiente con ocho campos y mensajes ingleses;
- configuración idempotente sin secretos;
- Turnstile nativo, `do_not_store` y entrega local en Mailpit;
- frontend, FSE, responsive, accesibilidad y rendimiento.

Quedan fuera de alcance Portafolio EN, almacenamiento de entradas, SMTP de
producción y cambios de diseño.

## Criterios de aceptación

1. `/en/contact/` responde con `lang="en-US"` y conserva la estructura española.
2. El selector conecta Contacto ES y EN en ambos sentidos.
3. El formulario EN es un post CF7 separado con locale `en_US`.
4. Campos, opciones, requeridos y mensajes coinciden con el inventario.
5. Turnstile y `do_not_store` conservan el ADR 0001 sin secretos versionados.
6. Validación y envío AJAX se anuncian en inglés; Mailpit recibe el correo.
7. El template abre en FSE sin Post Title ni bloques inválidos.
8. Contacto ES y los assets fuera de Contacto no sufren regresiones.
