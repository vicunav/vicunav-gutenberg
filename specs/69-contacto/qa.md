# QA: página de Contacto

Issue padre: #69<br>
Estado: aprobado<br>
Última actualización: 2026-07-28

## Entorno

| Campo | Valor |
|---|---|
| Referencia | `https://vicunav.com/contacto/` |
| Local | `https://vicunav-gutenberg.local/contacto/` |
| Viewports baseline | 390×844 y desktop |
| Usuario | anónimo |

## Baseline

- Copy, ocho campos y dieciséis opciones select inventariados.
- Cuatro campos requeridos: nombre, email, tipo de práctica y sitio actual.
- Layout de dos columnas en desktop y una columna en móvil.
- reCAPTCHA v3 y POST/AJAX confirmados.
- Cero overflow horizontal en desktop y móvil.
- Fondo publicado identificado como asset ya disponible en el theme.
- No se realizó ningún envío a producción.
- Contact Form 7 + Turnstile, sin almacenamiento, aprobado en ADR 0001.

## Resultado de implementación

- Contact Form 7 `6.1.6` activo y configuración válida con cero errores.
- Turnstile usa las claves oficiales de prueba de Cloudflare en LocalWP.
- Envío AJAX exitoso y correo recibido en Mailpit con `Reply-To` correcto.
- `do_not_store: true`, Flamingo ausente y cero tablas o posts de entradas.
- Estados inválido y éxito comprobados con mensajes en español.
- Consola sin errores ni warnings en frontend y Editor del sitio.
- Reflow aprobado en 320, 390, 768 y 1280 px, sin overflow horizontal.
- CSS, validación JavaScript y Turnstile no se cargan fuera de Contacto.
- Un H1, un formulario y una instancia de Turnstile en frontend.
- `page-contacto` abre en el Editor del sitio sin bloques inválidos, sin título
  de entrada y con **Guardar** deshabilitado al no existir cambios.

## Gates de implementación

- HTTP 200 y un solo H1.
- Copy, labels, tipos, opciones y requeridos exactos.
- Foco visible y orden de tabulación lógico.
- Error asociado al campo y resumen recuperable.
- Éxito anunciado y reenvío accidental prevenido.
- Entrega local comprobada sin exponer secretos.
- Antispam y privacidad documentados.
- Sin hotlinks, overflow ni carga global innecesaria.
- Site Editor sin bloques inválidos.
- `composer qa` y `composer audit`.

## Ledger

| Sección | Contenido | Macro desktop | Móvil | Funcional | Editor | Estado |
|---|---|---|---|---|---|---|
| Introducción | Pass | Pass | Pass | N/A | Pass | Pass |
| Formulario | Pass | Pass | Pass | Pass | Pass | Pass |
| Qué pasa después | Pass | Pass | Pass | N/A | Pass | Pass |

## Evidencia

- Baseline: `docs/qa/evidence/contacto/baseline/`.
- Regresión: `docs/qa/evidence/contacto/regression/`.
