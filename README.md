# Vicunav Gutenberg

Native block theme to migrate the Vicunav site from Elementor to Gutenberg Full Site Editing.

Phase 1 is a faithful reproduction of the existing site. It does not include a redesign, copy changes, or functional expansion. New visual decisions belong to later phases.

## Status

Phase 1 candidate verified on July 25, 2026:

- Local WordPress: `7.0.2`.
- Local PHP: `8.2`.
- Declared compatibility: WordPress `6.7+` and PHP `8.0+`.
- Release candidate: `0.2.0`.
- Completed: `theme.json`, header, footer, ten patterns, and `front-page.html`.
- QA completed: visual parity, cross-browser responsive, WCAG 2.2 AA, and performance.
- Services page implemented locally with nine patterns, its own template, and 17 native FAQs.
- Portfolio page implemented with two patterns, four projects,
  its own template, and parity QA.
- Contact page implemented with its own template, Contact Form 7,
  Turnstile, validated local delivery, and zero entry storage.
- Pending: multilingual architecture; does not include production deployment.

## Principles

1. `theme.json` is the single source of visual tokens.
2. Core blocks and registered patterns are preferred over custom blocks.
3. Every section of a page is a traceable, verifiable unit.
4. The copy, order, and hierarchy defined for Phase 1 are not reinterpreted.
5. Accessibility, performance, and security are acceptance criteria, not later tasks.
6. An implementation is not done without QA evidence.

The full rules are in [AGENTS.md](AGENTS.md) and in the [project Constitution](docs/CONSTITUTION.md).

## Local development

The LocalWP installation consumes this repository through a symlink:

```text
/Users/vicunav/Local Sites/vicunav-gutenberg/app/public/wp-content/themes/vicunav
  → /Users/vicunav/Documents/Codex/vicunav/vicunav-gutenberg
```

Site: <https://vicunav-gutenberg.local/>

Changes saved in the repository are available immediately in LocalWP. Before testing PHP or WP-CLI, review the MySQL socket rules in `AGENTS.md`.

The site language must be set to **Spanish** under **Settings → General → Site Language**. WordPress generates the document's `lang` attribute from that preference; the theme does not hardcode it.

### Quality gates

The tooling consists of dev dependencies and does not ship in the theme ZIP:

```bash
composer install
composer qa
composer audit
```

`composer qa` runs PHP lint, WordPress Coding Standards, PHPCompatibility, and structural validation of JSON, patterns, section styles, local paths, and secret signatures. GitHub Actions repeats these gates on PHP 8.0 and 8.2 with read-only permissions and actions pinned to a commit SHA.

## Editing pages, the header, and the footer

The homepage is edited from **Appearance → Editor → Design → Templates → Front Page**. The theme redirects "Edit page" access from the page configured as home to that canvas, because `front-page.html` — not the content or title of the static page — is the actual source of the design.

Services is edited from **Appearance → Editor → Design → Templates → page-servicios**. Its "Edit page" access also opens that canvas directly; `templates/page-servicios.html` is the source of the design, and the admin entry remains without visible content or title.

Portfolio is edited from **Appearance → Editor → Design → Templates → page-portafolio**. Its "Edit page" access opens the same canvas, and `templates/page-portafolio.html` remains the canonical source.

Contact is edited from **Appearance → Editor → Design → Templates → page-contacto**. The composition lives in `templates/page-contacto.html`; fields, email, and messages are managed in **Contact → Contact Forms**. The reproducible procedure and responsibilities are in [docs/CONTACT_FORM.md](docs/CONTACT_FORM.md).

The header and footer are edited from **Appearance → Editor → Design → Patterns → Manage my patterns → Template Parts**. There they appear as **Header** and **Footer**. Their source files are `parts/header.html` and `parts/footer.html`; saving a customization from WordPress creates a database override, which must be exported to the repository or removed before comparing against the clean theme.

## Structure

```text
assets/       Fonts, images, and other local resources
parts/        Template parts
patterns/     One registered section per file
templates/    FSE templates
docs/         Architecture, SDD, QA, and operations
.github/      Issue and pull request templates
theme.json    Tokens, settings, and global styles
style.css     Theme metadata and minimal global styles
```

## Documentation

Start at [docs/README.md](docs/README.md). The main paths are:

- [Architecture](docs/ARCHITECTURE.md)
- [Design System](docs/DESIGN_SYSTEM.md)
- [Editor contract](docs/EDITOR.md)
- [Visual migration playbook](docs/MIGRATION_PLAYBOOK.md)
- [Context and execution efficiency](docs/CONTEXT_EFFICIENCY.md)
- [Spec-Driven Development](docs/SPEC_DRIVEN_DEVELOPMENT.md)
- [GitHub workflow](docs/WORKFLOW.md)
- [QA strategy](docs/QA.md)
- [Performance](docs/PERFORMANCE.md)
- [Accessibility](docs/ACCESSIBILITY.md)
- [Security](SECURITY.md)
- [Releases](docs/RELEASES.md)
- [Official references](docs/REFERENCES.md)
- [Services spec](specs/2-servicios/spec.md)
- [Portfolio spec](specs/65-portafolio/spec.md)
- [Contact spec](specs/69-contacto/spec.md)
- [Form operations](docs/CONTACT_FORM.md)

## Contributing

Every change starts with a prepared issue and ends in a traceable pull request. See [CONTRIBUTING.md](CONTRIBUTING.md) before modifying the theme.
