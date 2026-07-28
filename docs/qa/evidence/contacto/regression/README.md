# Evidencia de regresión: Contacto

Fecha: 2026-07-28

## Capturas

- `local-desktop-top.png`: viewport 1280×900.
- `local-desktop-full.png`: composición completa en desktop.
- `local-mobile-top.png`: viewport 390×844.
- `local-mobile-extended.png`: viewport 390×1400 para revisar el formulario
  completo sin depender de una captura full-page.
- `site-editor.png`: template `page-contacto` en el Editor del sitio.

## Contratos comprobados

- un H1, un formulario y una instancia de Turnstile;
- dos columnas en desktop y una columna en móvil;
- cero overflow horizontal en 320, 390, 768 y 1280 px;
- validación obligatoria y mensaje de error en español;
- envío AJAX exitoso y correo recibido en Mailpit;
- `Reply-To` igual al correo enviado;
- `do_not_store: true`, Flamingo ausente y cero almacenamiento de entradas;
- assets de Contact Form 7 y Turnstile ausentes fuera de Contacto;
- Editor del sitio sin bloques inválidos ni título de entrada;
- consola limpia en frontend y editor.

Las claves de Turnstile usadas en LocalWP son las credenciales públicas de
prueba de Cloudflare. No se versionan credenciales reales ni datos de clientes.
