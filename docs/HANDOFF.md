# Handoff neutral entre agentes

Última actualización: 2026-09-22

## Propósito

Este documento permite retomar el proyecto con Codex, Claude Code u otro agente
sin depender del historial de una conversación. Es un snapshot operativo; las
reglas permanentes viven en `AGENTS.md` y la verdad del trabajo vive en GitHub,
los specs, ADR, commits y evidencia.

## Inicio seguro en cinco minutos

```bash
git status --short --branch
git switch main
git pull --ff-only origin main
gh issue list --repo vicunav/vicunav-gutenberg --state open --limit 20
```

Después:

1. leer `AGENTS.md` completo;
2. abrir el issue que se va a ejecutar y confirmar sus dependencias;
3. leer solo su spec, plan, tareas, QA, brief y dependencias directas;
4. crear una rama `codex/<issue>-<slug>` o el prefijo equivalente permitido por
   la herramienta, siempre trazable al mismo issue;
5. mantener producción como referencia de solo lectura.

No se continúa sobre una rama ajena o con cambios sin identificar. Si el árbol
está sucio, se determina primero la propiedad de cada cambio y no se descarta
nada por rutina.

## Estado consolidado

- `main` contiene Homepage, Servicios, Portafolio y Contacto en español como
  templates FSE nativos.
- Header y footer son template parts compartidos y editables.
- Contacto usa Contact Form 7 `6.1.6`, Turnstile nativo, `do_not_store` y Mailpit
  local conforme al ADR 0001.
- El PR #93 aceptó Polylang Free `3.8.6` como arquitectura ES/EN y cerró #85.
- El lote multidioma vive en el padre #86 y sus tareas #87–#91.
- #87 deja Polylang Free `3.8.6` activo solo en LocalWP, con `es_ES` sin
  prefijo, `en_US` bajo `/en/` y selector público que oculta destinos sin
  traducción.
- #88 añade Home EN en `/en/home/`, relacionada con `/`, con template,
  patterns, header, footer, copy y evidencia versionados.
- #89 añade Servicios EN en la ruta aprobada, relacionado con `/servicios/`,
  con nueve variantes localizadas, 17 FAQ, CTA por locale y evidencia completa.
- #90 añade Contacto EN en `/en/contact/`, relacionado con `/contacto/`, con
  formulario CF7 independiente, Turnstile, `do_not_store` y entrega en Mailpit.
- #91 aprueba la matriz integral de seis rutas y corrige la selección de
  `page-home` para que Home EN no herede header y footer españoles por la
  jerarquía `front-page` de WordPress.
- El lote multidioma #86–#91 está implementado y validado en LocalWP; su
  evidencia consolidada vive en `docs/qa/evidence/multilingual/91-integral.md`.
  #86 queda cerrado contra sus criterios canónicos; `CHANGELOG.md` permanece
  reservado al flujo de release y no se edita manualmente.
- El PR #99 actualizó PHP_CodeSniffer a `3.13.6` y cerró el advisory
  CVE-2026-67434 que bloqueaba `composer audit`.
- El PR #106 cerró #105 y corrigió la geometría de "Así funciona" en el
  Editor del sitio.
- El PR #109 cerró #107: el selector de idioma (Polylang) ya no lista el
  idioma activo como opción, en ambos headers (`hide_current`).
- El PR #110 cerró #108: `.vicunav-testimonio__card` usa `overflow: visible`
  en vez de `hidden`, para no recortar contenido superpuesto.
- No se ha realizado ningún cambio en producción.

## Siguiente trabajo exacto

No hay issues abiertos. No queda otro issue aprobado dentro del lote
multidioma. Antes de iniciar una nueva migración o cambio, crear un issue
que exprese un solo resultado observable (ver Definition of Ready en
`CONTRIBUTING.md`) y construir su contexto mínimo desde GitHub y sus specs.
Producción continúa fuera de alcance.

## Estado de LocalWP

El repositorio continúa enlazado al theme local mediante el symlink documentado
en `README.md`. LocalWP estaba iniciado al completar #87. Polylang `3.8.6`
está activo solo en ese entorno y se reprovisiona con
`bin/setup-polylang.php` siguiendo `docs/MULTILINGUAL.md`. No registrar rutas
de socket efímeras en GitHub.

## Contratos que no deben redescubrirse

- Español es el idioma predeterminado sin prefijo; inglés usa `/en/`.
- La verdad de contenido para las versiones inglesas es el inventario español
  aprobado, no la versión inglesa histórica.
- Polylang administra idiomas, relaciones, locale, URLs y selector. La única
  excepción del theme es seleccionar `page-home` para Home EN después de que la
  jerarquía core la clasifica como portada; no crea ni reescribe rutas.
- Polylang Pro queda fuera de alcance mientras no exista un requisito aprobado
  de edición traducida dentro de FSE.
- Portafolio no tiene versión inglesa aprobada en este lote.
- Contacto inglés tiene un formulario CF7 independiente y el mismo contrato de
  privacidad y antispam que Contacto español.
- No se reintroducen animaciones de Elementor en este lote.

## Gates antes de publicar

```bash
composer qa
composer audit
git diff --check
```

Además se aplican los gates específicos de `docs/QA.md`. Un cambio multidioma
no está completo con checks estáticos: debe verificar frontend, Site Editor,
responsive, teclado, locale, URLs y traducción equivalente en LocalWP.

Antes de fusionar:

1. confirmar que el diff pertenece solo al issue;
2. publicar PR con `Closes #<issue>` y evidencia;
3. esperar PHP 8.0 y 8.2 verdes;
4. usar squash merge;
5. volver a `main`, hacer pull `--ff-only` y confirmar árbol limpio;
6. actualizar este snapshot cuando cambie el siguiente issue o aparezca un
   bloqueo durable.

## Recuperación ante una pausa

Dejar en el issue o PR, no solo en el chat:

- resultado completado;
- rama y PR;
- archivos afectados;
- checks ejecutados y su estado;
- decisión o riesgo pendiente;
- siguiente comando o criterio verificable.

No guardar claves de Turnstile, contraseñas, salts, tokens, cookies ni datos de
formularios en este archivo, issues, commits o evidencias.
