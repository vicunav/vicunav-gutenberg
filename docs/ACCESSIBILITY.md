# Accesibilidad

## Estándar

Objetivo: WCAG 2.2 nivel AA para todo contenido y componente nuevo o modificado. La conformidad se evalúa sobre la página completa y sus variantes responsive.

## Checklist de implementación

### Estructura

- idioma del documento correcto;
- landmarks `header`, `nav`, `main` y `footer` sin anidaciones incorrectas;
- un `h1` y jerarquía de headings lógica;
- listas, citas, botones y enlaces usan el elemento semántico apropiado;
- skip link generado por el block theme funciona y lleva al `main`.

### Teclado y foco

- todo control es alcanzable y operable con teclado;
- orden de foco coincide con el orden visual y de lectura;
- foco siempre visible, con contraste suficiente y no oculto por cabeceras;
- overlays atrapan y devuelven foco correctamente y cierran con `Escape`;
- no hay keyboard traps.

### Visual

- contraste mínimo 4.5:1 para texto normal y 3:1 para texto grande;
- componentes y foco alcanzan 3:1 frente a colores adyacentes;
- targets cumplen al menos 24×24 CSS px o la excepción aplicable de WCAG 2.2;
- contenido refluye a 320 CSS px y con zoom 200% sin pérdida;
- color no es el único medio para comunicar estado;
- movimiento respeta `prefers-reduced-motion`.

### Contenido y medios

- alt text comunica propósito, no nombre de archivo;
- imagen decorativa usa `alt=""`;
- logos enlazados tienen nombre accesible suficiente;
- link text tiene sentido en contexto;
- copy permanece comprensible y consistente entre idiomas;
- iconos informativos tienen nombre; iconos decorativos se ocultan de tecnología asistiva.

### Formularios futuros

- label programático y visible;
- instrucciones antes de la entrada;
- errores identifican campo, causa y corrección;
- no depender de placeholder;
- autenticación sin pruebas cognitivas innecesarias;
- estados y mensajes se anuncian sin mover foco arbitrariamente.

## QA manual obligatorio

1. Recorrer desde la barra de direcciones usando `Tab`, `Shift+Tab`, `Enter`, `Space` y `Escape`.
2. Probar menú responsive abierto y cerrado.
3. Inspeccionar árbol de accesibilidad y nombres de controles.
4. Revisar headings/landmarks.
5. Probar zoom 200%, viewport 320 px y tamaño de texto aumentado.
6. Probar reduced motion y contraste forzado cuando aplique.
7. Realizar smoke con VoiceOver/Safari en macOS para navegación principal.

Un scanner automatizado ayuda a detectar errores, pero no aprueba semántica, orden de lectura, copy ni experiencia con lector de pantalla.

## Criterio de bloqueo

Una violación WCAG A/AA introducida por el cambio, un control inaccesible por teclado o una pérdida de contenido bloquea merge. Una excepción requiere issue, impacto, workaround, owner y fecha de corrección; no puede convertirse en deuda indefinida.

Fuentes: [WordPress Accessibility Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/accessibility/), [WCAG 2.2](https://www.w3.org/TR/WCAG22/) y [novedades de WCAG 2.2](https://www.w3.org/WAI/standards-guidelines/wcag/new-in-22/).
