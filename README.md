# Vicunav Gutenberg

Theme de bloques nativo para migrar el sitio de Vicunav desde Elementor a Gutenberg Full Site Editing.

La Fase 1 es una reproducción fiel del sitio existente. No incluye rediseño, cambios de copy ni ampliación funcional. Las decisiones visuales nuevas pertenecen a fases posteriores.

## Estado

Candidato de Fase 1 comprobado el 25 de julio de 2026:

- WordPress local: `7.0.2`.
- PHP local: `8.2`.
- Compatibilidad declarada: WordPress `6.7+` y PHP `8.0+`.
- Release candidate: `0.2.0`.
- Completado: `theme.json`, cabecera, pie de página, diez patterns y `front-page.html`.
- QA completado: paridad visual, responsive cross-browser, WCAG 2.2 AA y rendimiento.
- Página de Servicios implementada localmente con nueve patterns, template propio y 17 FAQ nativas.
- Pendiente: revisión e integración de Servicios; no incluye despliegue a producción.

## Principios

1. `theme.json` es la fuente única de tokens visuales.
2. Se prefieren bloques core y patterns registrados antes que bloques custom.
3. Cada sección de una página es una unidad trazable y verificable.
4. El copy, el orden y la jerarquía definidos para la Fase 1 no se reinterpretan.
5. Accesibilidad, rendimiento y seguridad son criterios de aceptación, no tareas posteriores.
6. Una implementación no está terminada sin evidencia de QA.

Las reglas completas están en [AGENTS.md](AGENTS.md) y en la [Constitución del proyecto](docs/CONSTITUTION.md).

## Desarrollo local

La instalación LocalWP consume este repositorio mediante un enlace simbólico:

```text
/Users/vicunav/Local Sites/vicunav-gutenberg/app/public/wp-content/themes/vicunav
  → /Users/vicunav/Documents/Codex/vicunav/vicunav-gutenberg
```

Sitio: <https://vicunav-gutenberg.local/>

Los cambios guardados en el repositorio quedan disponibles inmediatamente en LocalWP. Antes de probar PHP o WP-CLI, revisar las reglas de socket MySQL de `AGENTS.md`.

El idioma del sitio debe configurarse como **Español** en **Ajustes → Generales → Idioma del sitio**. WordPress genera el atributo `lang` del documento desde esa preferencia; el theme no lo hardcodea.

### Quality gates

Las herramientas son dependencias de desarrollo y no entran al ZIP del theme:

```bash
composer install
composer qa
composer audit
```

`composer qa` ejecuta PHP lint, WordPress Coding Standards, PHPCompatibility y la validación estructural de JSON, patterns, section styles, rutas locales y firmas de secretos. GitHub Actions repite estos gates en PHP 8.0 y 8.2 con permisos de solo lectura y actions fijadas a commit SHA.

## Editar las páginas, el header y el footer

La portada se edita desde **Apariencia → Editor → Diseño → Plantillas → Portada**. El theme redirige los accesos “Editar página” de la página configurada como inicio hacia ese lienzo, porque `front-page.html` —no el contenido ni el título de la página estática— es la fuente real del diseño.

Servicios se edita desde **Apariencia → Editor → Diseño → Plantillas → page-servicios**. Su acceso “Editar página” también abre directamente ese lienzo; `templates/page-servicios.html` es la fuente del diseño y la entrada administrativa permanece sin contenido ni título visible.

El header y el footer se editan desde **Apariencia → Editor → Diseño → Patrones → Administrar mis patrones → Partes de plantilla**. Allí aparecen como **Cabecera** y **Pie de página**. Sus archivos fuente son `parts/header.html` y `parts/footer.html`; guardar una personalización desde WordPress crea un override en la base de datos, que debe exportarse al repositorio o eliminarse antes de comparar el theme limpio.

## Estructura

```text
assets/       Fuentes, imágenes y otros recursos locales
parts/        Template parts
patterns/     Una sección registrada por archivo
templates/    Templates FSE
docs/         Arquitectura, SDD, QA y operación
.github/      Plantillas de issues y pull requests
theme.json    Tokens, settings y estilos globales
style.css     Metadatos y estilos globales mínimos del theme
```

## Documentación

Empezar por [docs/README.md](docs/README.md). Las rutas principales son:

- [Arquitectura](docs/ARCHITECTURE.md)
- [Design System](docs/DESIGN_SYSTEM.md)
- [Contrato del editor](docs/EDITOR.md)
- [Playbook de migración visual](docs/MIGRATION_PLAYBOOK.md)
- [Eficiencia de contexto y ejecución](docs/CONTEXT_EFFICIENCY.md)
- [Spec-Driven Development](docs/SPEC_DRIVEN_DEVELOPMENT.md)
- [Workflow de GitHub](docs/WORKFLOW.md)
- [Estrategia de QA](docs/QA.md)
- [Rendimiento](docs/PERFORMANCE.md)
- [Accesibilidad](docs/ACCESSIBILITY.md)
- [Seguridad](SECURITY.md)
- [Releases](docs/RELEASES.md)
- [Referencias oficiales](docs/REFERENCES.md)
- [Spec de Servicios](specs/2-servicios/spec.md)

## Contribuir

Todo cambio comienza en un issue preparado y termina en un pull request trazable. Consultar [CONTRIBUTING.md](CONTRIBUTING.md) antes de modificar el theme.
