# Plan: página de Contacto

Spec: [`spec.md`](spec.md)<br>
Issue padre: #69<br>
Estado: Approved

## Resumen técnico

El template ensamblará header, contenido de Contacto y footer sin contenido de
entrada. Los bloques core resolverán la composición; `core/shortcode` conecta
el formulario de Contact Form 7 y Turnstile cubre antispam conforme al ADR
0001. Un filtro de render acotado ejecuta solo shortcodes de Contact Form 7
cuando el pattern se incluye directamente desde un block template.

## Archivos previstos

| Ruta | Cambio | Motivo |
|---|---|---|
| `patterns/contacto-formulario.php` | Nuevo | Introducción, formulario y post-envío |
| `assets/css/contacto.css` | Nuevo | Grid y ajustes responsive |
| `templates/page-contacto.html` | Nuevo | Template canónico |
| `inc/assets.php` | Modificar | CSS acotado |
| `inc/dependencies.php` | Nuevo | Contrato y puente de render de Contact Form 7 |
| `inc/editor.php` | Modificar | Ruta canónica del editor |
| `bin/validate-theme.php` | Modificar | Template requerido |
| `bin/setup-contacto.php` | Nuevo | Sincronización reproducible de página y formulario |
| `config/contact-form-7/contacto-es.json` | Nuevo | Configuración versionada sin secretos |
| `specs/69-contacto/` | Modificar | Decisión, QA y regresión |

La configuración de Contact Form 7 se exporta fuera del runtime del theme. No
se instala almacenamiento de entradas.

## Flujo

1. Capturar baseline e inventario.
2. Aprobar solución de formulario en #72.
3. Instalar/configurar la dependencia aprobada.
4. Implementar composición con bloques core.
5. Integrar template y acceso del editor.
6. Verificar error, éxito, antispam, entrega y privacidad.
7. Comparar desktop/móvil y cerrar QA.

## Gates

- fidelidad visual sección por sección;
- navegación por teclado, labels y errores asociados;
- prueba local de entrega sin usar producción;
- secretos fuera del repo y del markup;
- carga acotada a Contacto;
- `composer qa`, `composer audit` y Site Editor.

## Rollback

Revertir template, pattern y configuración del plugin. Desactivar o retirar la
dependencia solo después de comprobar que no almacena datos que deban
preservarse.
