# QA de infraestructura multilingüe — #87

Fecha: 2026-08-03

Entorno: LocalWP `vicunav-gutenberg`, WordPress local y Polylang Free `3.8.6`.

## Resultado

- Instalación: activa solo en LocalWP (`polylang`, versión `3.8.6`).
- Idiomas: `es_ES` (`es`) predeterminado y sin prefijo; `en_US` (`en`) bajo
  `/en/`.
- Páginas existentes: Inicio, Servicios, Portafolio y Contacto asignadas a
  español. Las relaciones ES/EN quedan para #88–#90, cuando existan sus
  traducciones aprobadas.
- Selector: bloque público `polylang/navigation-language-switcher` dentro de
  la navegación compartida. Declara `lang`, `hreflang` y `aria-current` para
  el idioma activo; oculta destinos sin traducción. Por ello Portafolio no
  enlaza a una página inglesa inexistente.
- Responsive: a 390×844 el selector aparece en el overlay móvil y no produce
  overflow horizontal.
- Editor: el bloque queda registrado por Polylang y el markup se procesa sin
  bloques inválidos. La apertura interactiva del Editor del sitio requiere una
  sesión administrativa local, que no está disponible en esta ejecución.

## Comandos y comprobaciones

```text
wp plugin get polylang --fields=name,status,version
wp eval-file bin/setup-polylang.php
php -l bin/setup-polylang.php
jq empty config/polylang/languages.json
git diff --check
```

El aprovisionamiento se ejecutó dos veces sin crear idiomas duplicados. No se
crearon páginas inglesas, no se modificó producción y no se registraron
secretos ni datos de formularios.

Como prueba de rollback, Polylang se desactivó temporalmente: la portada
española respondió HTTP 200. Después se reactivó y se ejecutó nuevamente el
aprovisionamiento versionado.

## Rollback

Retirar el bloque de selector del header, desactivar Polylang y comprobar las
rutas españolas. No eliminar idiomas, relaciones o páginas sin una
autorización explícita.
