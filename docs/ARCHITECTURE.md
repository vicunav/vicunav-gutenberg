# Arquitectura del theme

## Objetivo

Implementar el homepage de Vicunav como block theme nativo, manteniendo el contrato visual y de contenido de la Fase 1 y dejando una base extensible para fases posteriores.

## Baseline técnica

- WordPress mínimo declarado: 6.7.
- WordPress local comprobado: 7.0.2.
- `theme.json`: versión 3.
- PHP mínimo declarado: 8.0.
- Runtime LocalWP comprobado: PHP 8.2.
- Frontend: bloques core, HTML de templates y CSS generado por WordPress.
- JavaScript propio: ninguno por defecto.

Una API introducida después de WordPress 6.7 solo puede usarse con fallback o elevando explícitamente `Requires at least` mediante spec.

## Mapa de responsabilidades

| Ruta | Responsabilidad |
|---|---|
| `theme.json` | Paleta, tipografías, escalas, settings, estilos globales y metadata de template parts |
| `style.css` | Header requerido del theme; CSS estructural solo si `theme.json` o estilos por bloque no lo resuelven |
| `templates/` | Estructura de documento y composición de patterns/template parts |
| `parts/` | Cabecera, pie y otras regiones reutilizables |
| `patterns/` | Una sección del homepage por archivo registrado |
| `assets/` | Recursos locales con licencia y procedencia verificables |
| `functions.php` | Solo hooks imprescindibles; no existe hasta que un spec justifique su necesidad |
| `docs/` | Contratos de arquitectura, proceso y calidad |

## Composición esperada del homepage

```text
templates/front-page.html
├── parts/header.html
├── patterns/hero.php
├── patterns/situaciones.php
├── patterns/como-ayudamos.php
├── patterns/testimonio.php
├── patterns/resultados.php
├── patterns/deberia-sentirse-como-tu.php
├── patterns/conoce-a-mario.php
├── patterns/cta-final.php
└── parts/footer.html
```

`front-page.html` ensambla; no duplica markup interno. Cada pattern incluye al menos `Title`, `Slug`, `Categories` y `Block Types` en su header y usa el namespace `vicunav/`.

## Flujo de estilos

```text
Inventario visual aprobado
  → tokens de theme.json
    → atributos/presets de bloques
      → CSS generado por WordPress
```

Orden de preferencia:

1. preset o estilo global de `theme.json`;
2. configuración por bloque en `theme.json`;
3. atributo soportado por el bloque;
4. estilo por bloque cargado solo donde se usa;
5. CSS global mínimo y documentado.

Nunca duplicar un color o una familia tipográfica en un pattern. Una excepción estructural de CSS no puede introducir tokens visuales nuevos.

## Contenido y semántica

- Un solo `h1` describe la página.
- Los títulos de sección siguen con `h2`; subsecciones usan `h3` sin saltos arbitrarios.
- `header`, `main`, `footer` y `nav` mantienen landmarks claros.
- Los enlaces describen destino; los botones representan acciones.
- Imágenes informativas tienen `alt`; decorativas usan `alt=""`.
- El copy vive en el pattern correspondiente y coincide con el inventario aprobado.

## Theme versus plugin

El theme puede definir presentación, templates, patterns, estilos y tamaños de imagen vinculados al diseño. No debe implementar formularios, reservas, analytics, schema de negocio, CPT, shortcodes, roles, endpoints o almacenamiento persistente. Esa separación protege portabilidad y seguridad.

## Assets

- Preferir recursos self-hosted.
- Registrar fuente, autor y licencia.
- Imágenes raster: AVIF o WebP cuando sea compatible con el flujo; dimensiones explícitas.
- SVG: solo de fuente confiable, sanitizado y sin scripts.
- Fuentes: WOFF2/subsets para release; cargar únicamente familias, estilos y pesos usados.
- No depender de URLs de producción para renderizar el theme.

## Compatibilidad con el editor

Un cambio visual se prueba tanto en Site Editor como en frontend. No se acepta CSS que “arregle” el frontend rompiendo la representación del editor. Los overrides guardados en base de datos se detectan y eliminan o se documentan antes de comparar archivos del theme.

La estructura de portada usa locks nativos: `all` protege el ensamblaje de template y `contentOnly` cura la edición de cada sección y template part. El contrato completo, incluida la reconciliación de overrides, vive en [EDITOR.md](EDITOR.md).

## Decisiones aceptadas

- Block theme desde cero, no child theme.
- Tokens centralizados en `theme.json`.
- Patterns por sección antes que bloques custom.
- Fuentes self-hosted.
- LocalWP consume el repositorio mediante symlink.
- Sin animaciones Elementor en Fase 1.

Una modificación de estas decisiones requiere ADR.
