# Releases

## Versionado

Usar Semantic Versioning:

- `0.x.y`: desarrollo antes del primer release estable.
- `MAJOR`: cambio incompatible de contrato o requisitos.
- `MINOR`: feature compatible o fase terminada.
- `PATCH`: corrección compatible sin cambio de alcance.

La versión debe coincidir en `style.css`, tag y changelog.

## Preparación

1. congelar scope del milestone;
2. cerrar o sacar del milestone cualquier issue incompleto;
3. actualizar `CHANGELOG.md` y documentación;
4. ejecutar matriz completa de `docs/QA.md` en commit candidato;
5. comprobar Theme Check y requisitos de block themes;
6. verificar licencias y procedencia de todos los assets;
7. revisar seguridad, privacidad, rendimiento y accesibilidad;
8. probar upgrade desde la release anterior y una instalación limpia;
9. validar staging con cache y configuración equivalentes a producción.

## Artefacto

El ZIP contiene una única carpeta `vicunav/` con archivos necesarios para ejecución y licencias. Excluir:

- `.git`, `.github` y configuración local;
- dumps, logs, capturas QA y secretos;
- `node_modules`, caches y fuentes de build no requeridas;
- symlinks y archivos del sistema.

No excluir licencias de fuentes/assets ni la documentación mínima requerida para distribución.

## Checklist de publicación

- [ ] PR de release aprobado y checks verdes.
- [ ] `main` coincide con el commit probado.
- [ ] versión y changelog actualizados.
- [ ] backup de archivos y base de datos confirmado.
- [ ] rollback probado o descrito.
- [ ] artefacto instalado en staging desde ZIP, no desde symlink.
- [ ] homepage comparado visualmente.
- [ ] smoke de navegación, editor y formularios integrados.
- [ ] Core Web Vitals/Lighthouse sin regresión.
- [ ] tag anotado `vX.Y.Z` creado desde el commit exacto.
- [ ] notas de release incluyen cambios, compatibilidad, migración y riesgos.

## Producción

El despliegue a producción requiere autorización explícita y nunca ocurre como efecto lateral de un merge. Después de desplegar:

- purgar cache de forma controlada;
- comprobar HTTP, assets, navegación y logs;
- realizar smoke anónimo y autenticado;
- monitorizar errores y rendimiento;
- conservar el artefacto anterior.

## Rollback

Rollback significa reinstalar el artefacto anterior y restaurar datos solo si la release modificó datos. El theme debe evitar migraciones de datos. Documentar causa, ventana afectada y follow-up; no corregir directamente en producción sin llevar el cambio al repositorio.

Fuentes: [Releasing Your Theme](https://developer.wordpress.org/themes/releasing-your-theme/), [Theme Review requirements](https://make.wordpress.org/themes/handbook/review/required/) y [Publishing Themes](https://developer.wordpress.org/themes/advanced-topics/publishing-themes/).
