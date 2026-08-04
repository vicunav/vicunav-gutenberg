# ADR 0002: Polylang Free para la experiencia ES/EN

Estado: Accepted  
Fecha: 2026-08-03  
Issue: #85

## Contexto

El sitio necesita relacionar páginas en español e inglés, emitir el locale
correcto, conservar URLs estables y ofrecer un selector que lleve a la
traducción equivalente. Esas responsabilidades pertenecen a la capa de
contenido de WordPress y no a la presentación del theme.

La implementación actual mantiene templates, template parts, patterns, assets
y copy versionados. No existe un requisito aprobado para traducir template
parts desde la interfaz de WordPress ni para sincronizar contenido entre
idiomas.

## Drivers de decisión

- evitar routing y estado multidioma propios dentro del theme;
- conservar edición con Gutenberg y compatibilidad con WordPress 6.7+;
- mantener el código y el contenido visual públicamente revisables;
- no introducir una licencia mientras no resuelva una necesidad concreta;
- permitir instalación, validación y rollback reproducibles;
- no enviar contenido a servicios de traducción automática.

## Opciones consideradas

### Polylang Free 3.8.6

Administra idiomas, relaciones entre traducciones, locale, prefijos de URL y
selectores de idioma. La versión evaluada incluye bloques de selector general y
de navegación.

### Polylang Pro

Añade, entre otras capacidades, traducción de template parts desde el Editor
del sitio, duplicación y sincronización editorial. Esas capacidades no forman
parte del alcance actual basado en archivos.

### Routing propio en el theme

Requeriría implementar relaciones, URLs, locale, metadatos y estado persistente
como funcionalidad del theme. Aumentaría el acoplamiento, el riesgo y el coste
de mantenimiento.

## Decisión

Usar **Polylang Free 3.8.6** como dependencia operativa de WordPress para la
experiencia ES/EN.

El contrato de responsabilidades es:

- Polylang administra idiomas, relaciones, locale, URLs y resolución del
  selector;
- el theme administra presentación, templates, patterns, estilos, assets y el
  copy versionado;
- español es el idioma predeterminado sin prefijo;
- inglés vive bajo `/en/` y conserva las rutas aprobadas;
- Contact Form 7 mantiene un formulario independiente por idioma;
- no se usa traducción automática ni se envía copy a terceros;
- la dependencia se instala en WordPress y no se incorpora al ZIP del theme;
- producción permanece fuera de alcance hasta una fase de despliegue aprobada.

Polylang Pro solo se reconsiderará mediante un nuevo ADR si aparece un requisito
de edición de template parts traducidos desde FSE, sincronización editorial u
otra capacidad exclusiva verificable.

## Consecuencias

### Positivas

- las responsabilidades multidioma no contaminan el theme;
- el selector puede usar APIs y bloques mantenidos por el plugin;
- las traducciones visuales permanecen trazables en Git;
- no hay coste de licencia ni dependencia de traducción remota;
- una futura migración a Pro no cambia el contrato base de contenido.

### Negativas

- WordPress necesita una dependencia operativa adicional;
- las traducciones se mantienen como documentos independientes;
- el equipo debe validar relaciones y URLs después de importar o sincronizar
  contenido;
- traducir template parts desde FSE queda fuera de alcance con la edición Free.

## Plan de validación y rollback

La instalación y configuración se ejecutan primero en LocalWP siguiendo
[`docs/MULTILINGUAL.md`](../MULTILINGUAL.md). El gate exige comprobar locale,
atributo `lang`, URLs, navegación, traducción equivalente, frontend y Site
Editor sin regresiones en español.

Para rollback se retira el selector consumidor, se exportan relaciones o
contenido que deban conservarse y se desactiva Polylang. Desactivar el plugin no
debe impedir que el theme renderice sus templates en el idioma predeterminado.

## Referencias

- [Polylang en WordPress.org](https://wordpress.org/plugins/polylang/)
- [Language switcher](https://polylang.pro/documentation/support/guides/the-language-switcher/)
- [Polylang y Site Editor](https://polylang.pro/documentation/support/guides/site-editor/)

