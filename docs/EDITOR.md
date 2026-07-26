# Contrato del Editor del sitio

## Objetivo

El Editor del sitio debe permitir cambiar contenido real sin exponer accidentalmente decisiones estructurales. El bloqueo protege el diseño; no sustituye permisos, revisiones ni versionado.

## Qué se puede editar

En la portada se pueden editar:

- títulos, párrafos, listas y atribuciones;
- etiquetas y destinos de botones;
- enlaces del header y del footer;
- imágenes y textos alternativos;
- copy legal y datos de contacto.

Los diez patterns, el header y el footer usan `templateLock: contentOnly`. Gutenberg presenta primero el contenido útil y evita borrar columnas, contenedores o piezas responsive por accidente. El template de portada usa `templateLock: all` en el armazón y en `main` para conservar header, orden de secciones y footer.

Un administrador con capacidad para bloquear bloques puede activar **Modificar** al editar un pattern cuando necesite trabajar deliberadamente con layout, estilos de sección o estructura. Ese modo es para mantenimiento del theme, no para cambios rutinarios de copy.

## Dónde editar

- **Portada:** barra administrativa → **Editar sitio**. El enlace de edición de la página estática redirige al template `front-page`.
- **Header:** Apariencia → Editor → Diseño → Patrones → Administrar mis patrones → Partes de plantilla → Cabecera.
- **Footer:** Apariencia → Editor → Diseño → Patrones → Administrar mis patrones → Partes de plantilla → Pie de página.
- **Sección:** abrir la portada, seleccionar la sección y elegir **Editar el patrón**. En modo de contenido se muestran únicamente sus campos editables.

Los nombres exactos pueden variar ligeramente por versión o idioma de WordPress; la entidad canónica siempre es el template, pattern o template part, no el contenido de la página estática.

## Dónde guarda WordPress los cambios

El archivo del theme es el origen versionado. Cuando se guarda una personalización desde el editor, WordPress puede crear un override en la base de datos:

| Entidad | Post type |
|---|---|
| Template | `wp_template` |
| Header/footer | `wp_template_part` |
| Estilos globales | `wp_global_styles` |
| Navegación | `wp_navigation` |

Un override tiene prioridad sobre el archivo del theme. Por eso un cambio en Git puede parecer “ignorado” aunque el código sea correcto.

## Flujo para conservar cambios del editor

1. Antes de resetear, usar Editor → Opciones → Herramientas → **Exportar**.
2. Guardar el ZIP solo como insumo temporal; nunca contiene la fuente final por sí mismo.
3. Comparar templates, parts y estilos exportados contra el repositorio.
4. Portar intencionalmente el cambio a `templates/`, `parts/`, `patterns/` o `theme.json`.
5. Ejecutar QA de editor y frontend.
6. Eliminar la personalización desde la acción **Restablecer/Borrar personalizaciones** de la entidad correspondiente.
7. Confirmar que WordPress vuelve a resolverla con `source: theme`.

No borrar filas directamente en la base de datos. Si la interfaz no permite restablecer una entidad, abrir un issue y respaldar primero el sitio LocalWP.

## Auditoría con WP-CLI

Ejecutar estos comandos desde la instalación local, usando el PHP y socket de LocalWP documentados en `AGENTS.md`:

```bash
wp post list \
  --post_type=wp_template,wp_template_part,wp_global_styles,wp_navigation \
  --post_status=publish,draft \
  --fields=ID,post_type,post_name,post_status \
  --format=table
```

Para templates y template parts, `get_block_templates()` debe reportar `source: theme` y `has_theme_file: true` cuando no existe un override.

La auditoría nunca imprime `post_content`, contraseñas, salts, tokens ni claves. Para investigar un override basta con registrar ID, slug, source, origin y estado.

## Gate antes de un release

- Portada, header y footer abren sin avisos de bloque inválido.
- Todo el copy esperado puede seleccionarse y editarse.
- La estructura no se mueve ni se elimina en modo de contenido.
- No hay overrides de templates o parts sin integrar.
- `wp_global_styles` no contiene cambios de settings/styles no documentados.
- Frontend y editor conservan paridad visual.
