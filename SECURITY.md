# Política de seguridad

## Reporte responsable

No publicar vulnerabilidades explotables, credenciales ni datos sensibles en issues públicos.

Cuando el repositorio esté alojado en GitHub, usar **Private vulnerability reporting** o un Security Advisory privado. Si ese canal no está habilitado, contactar al mantenedor mediante un canal privado previamente acordado. Incluir:

- componente y versiones afectadas;
- pasos mínimos de reproducción;
- impacto y prerrequisitos;
- prueba de concepto segura, sin datos reales;
- mitigación propuesta, si existe.

El mantenedor acusará recibo, validará severidad y coordinará corrección y divulgación. No se promete un SLA público mientras el proyecto sea privado, pero una vulnerabilidad confirmada bloquea releases.

## Modelo de riesgo

Este repositorio es un theme de presentación. Debe evitar funcionalidad propia de plugins, persistencia innecesaria y superficies de administración. Los principales riesgos son:

- XSS por salida o markup no confiable;
- CSRF y autorización incorrecta si se añade PHP interactivo;
- carga de recursos remotos y filtración de datos;
- dependencias o GitHub Actions comprometidas;
- enlaces, iframes o formularios configurados de forma insegura;
- exposición accidental de secretos, dumps o configuración LocalWP;
- políticas CSP o headers incompatibles con recursos del theme.

## Reglas de desarrollo seguro

1. Tratar entrada, base de datos y APIs externas como no confiables.
2. Validar contra un conjunto permitido siempre que sea posible; sanitizar después.
3. Escapar tarde y según contexto: HTML, atributos, URL, JavaScript o HTML permitido.
4. Los nonces mitigan CSRF, pero nunca sustituyen `current_user_can()` ni autenticación.
5. Usar APIs públicas de WordPress; no consultar tablas directamente salvo una necesidad aprobada.
6. No implementar SEO, analytics, formularios, reservas, roles o almacenamiento de negocio dentro del theme.
7. No incluir secretos en código, documentación, fixtures, capturas, logs o workflows.
8. No cargar fuentes, scripts, imágenes o telemetría remota sin consentimiento explícito.
9. Prefijar cualquier símbolo PHP público con `vicunav_`.
10. Mantener WordPress, PHP y dependencias soportadas y actualizadas.

## GitHub Actions y cadena de suministro

- `permissions: contents: read` por defecto; elevar permisos solo por job.
- Fijar actions de terceros a un commit SHA completo y verificado.
- Evitar `pull_request_target` con checkout o ejecución de código no confiable.
- No imprimir contextos completos ni valores derivados de secretos.
- Habilitar Dependabot para GitHub Actions cuando existan workflows.
- Proteger `.github/workflows/` con CODEOWNERS cuando haya un owner confirmado.
- Revisar el origen y licencia de cada asset o dependencia incorporada.

## Headers y configuración del servidor

CSP, HSTS, `Referrer-Policy`, `Permissions-Policy` y protecciones de framing pertenecen al servidor o plataforma, no al theme. Se prueban en staging antes de producción. Una CSP se despliega primero en modo report-only, se corrigen violaciones legítimas y luego se fuerza; nunca se debilita con `*` o `unsafe-eval` para ocultar un problema.

## Gate de release

Antes de publicar:

- revisar diff y artefacto para secretos;
- ejecutar los controles de seguridad de `docs/QA.md`;
- verificar que `WP_DEBUG_DISPLAY` está desactivado en producción;
- confirmar permisos de archivos, HTTPS y headers en staging;
- documentar cualquier riesgo aceptado con responsable y fecha de revisión.

Referencias: [WordPress Security](https://developer.wordpress.org/apis/security/), [OWASP Secure Headers](https://owasp.org/www-project-secure-headers/) y [GitHub Actions secure use](https://docs.github.com/en/actions/reference/security/secure-use).
