# Experiencia multidioma ES/EN

Decisión: [ADR 0002](adr/0002-polylang-free-para-es-en.md)  
Backlog: [issue #86](https://github.com/vicunav/vicunav-gutenberg/issues/86)

## Contrato

- Dependencia aprobada: Polylang Free `3.8.6`.
- Español: idioma predeterminado sin prefijo.
- Inglés: prefijo `/en/`.
- El plugin resuelve idiomas, relaciones, locale, URLs y selector.
- El theme conserva templates, patterns, assets, estilos y copy versionados.
- Las traducciones parten del inventario español aprobado, no de la versión
  inglesa histórica.
- No se modifica producción durante implementación y QA local.

## Instalación local

LocalWP debe tener el sitio iniciado antes de ejecutar WP-CLI. La dependencia
se instala en WordPress, no dentro del repositorio ni del paquete del theme:

```bash
wp plugin install polylang --version=3.8.6 --activate
wp plugin get polylang --fields=name,status,version
```

Si WP-CLI carga `wp-load.php` pero devuelve un error de conexión, no se modifica
el plugin ni `wp-config.php` por inferencia. Se aplican las reglas de socket
LocalWP de `AGENTS.md`: identificar el socket activo mediante una consulta de
solo lectura a `home`/`siteurl` y pasar los overrides de `mysqli` y PDO al PHP
de LocalWP. Nunca se imprimen credenciales, salts o claves.

## Configuración inicial

La tarea de infraestructura [#87](https://github.com/vicunav/vicunav-gutenberg/issues/87)
debe convertir estos pasos en configuración reproducible y verificable:

1. crear `es_ES` como idioma predeterminado;
2. crear el locale inglés aprobado y asignarle el slug `en`;
3. conservar las URLs españolas sin prefijo;
4. relacionar cada página solo con su traducción equivalente;
5. añadir el selector a la navegación con nombre accesible y estado actual;
6. comprobar la navegación responsive y el Editor del sitio;
7. documentar cualquier estado que permanezca en la base de datos.

No se edita `parts/header.html` para simular URLs por idioma. El selector debe
usar la integración pública de Polylang o sus bloques soportados.

## Rutas aprobadas

| Español | Inglés |
|---|---|
| `/` | `/en/home/` |
| `/servicios/` | `/en/website-design-for-therapists-and-wellness-practices/` |
| `/contacto/` | `/en/contact/` |

Portafolio no tiene traducción inglesa aprobada en este lote. El comportamiento
del selector cuando no exista traducción se define y prueba en #87 antes de
publicar el control.

## Formularios

Contacto inglés usa un formulario Contact Form 7 independiente con su propio
locale, etiquetas, mensajes y correo. Comparte el contrato del
[ADR 0001](adr/0001-contact-form-7-y-turnstile.md): Turnstile mediante la
integración nativa, `do_not_store`, sin Flamingo y sin secretos versionados.

La configuración española no se reutiliza cambiando texto en tiempo de render.
El aprovisionamiento inglés debe ser idempotente y vivir en un archivo de
configuración y un script versionados.

## QA mínimo

- `html[lang]`, locale y URL corresponden al idioma activo;
- cada selector lleva a la traducción equivalente y anuncia el idioma;
- enlaces internos, navegación, header y footer conservan el locale;
- no hay título administrativo ni bloques inválidos en Site Editor;
- desktop, tablet, móvil, teclado, foco, reflow y lector de pantalla smoke;
- formularios ES/EN validan, pasan Turnstile, entregan en Mailpit y no guardan
  entradas;
- `composer qa`, `composer audit` y `git diff --check` pasan antes de cada PR.

## Actualización y rollback

Una actualización de Polylang se prueba primero en LocalWP contra la matriz
anterior y se registra como cambio de dependencia. Se revisa el changelog
oficial y se conserva la versión exacta del procedimiento reproducible.

Para rollback:

1. exportar o registrar las relaciones que deban conservarse;
2. retirar el selector del header si depende del plugin;
3. desactivar Polylang;
4. comprobar que los templates españoles siguen renderizando;
5. no eliminar páginas ni datos sin una autorización explícita.

