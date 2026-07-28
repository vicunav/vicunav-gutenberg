# Inventario de contenido: Contacto

Fuente de verdad: `https://vicunav.com/contacto/`<br>
Captura: 2026-07-28, usuario anónimo.

## Introducción

- Eyebrow: “Comencemos”
- H1 semántico: “El primer paso es simple”
- Párrafo: “Este formulario corto nos ayuda a entender dónde estás, y cómo
  orientarte mejor a partir de ahí.”

## Formulario

| # | Label | Tipo | Requerido | Placeholder/valor inicial |
|---:|---|---|---|---|
| 1 | Nombre completo | text | Sí | Nombre completo |
| 2 | Correo electrónico | email | Sí | Correo electrónico |
| 3 | Tipo de negocio o práctica | select | Sí | Coach o consultor |
| 4 | ¿Tienes un sitio web actualmente? | select | Sí | Sí |
| 5 | ¿Cuál de estas situaciones te describe mejor? | select | No | Estoy comenzando desde cero |
| 6 | ¿Cómo prefieres continuar? | select | No | Me gustaría agendar una llamada de descubrimiento |
| 7 | ¿Con qué esperas recibir ayuda en este momento? | textarea | No | Escribe aquí... |
| 8 | ¿Hay algo que quieras que sepamos antes de responderte? | textarea | No | Escribe aquí... |

### Tipo de negocio o práctica

1. Coach o consultor
2. Terapeuta o profesional de salud mental
3. Profesional de bienestar o vida
4. Formador o educador
5. Profesional independiente
6. Pequeño negocio de servicios
7. Otro

### ¿Tienes un sitio web actualmente?

1. Sí
2. No

### ¿Cuál de estas situaciones te describe mejor?

1. Estoy comenzando desde cero
2. Mi sitio actual ya no refleja mi trabajo
3. Necesito más claridad y estructura
4. No estoy seguro aún, pero siento que estoy estancado
5. Otro

### ¿Cómo prefieres continuar?

1. Me gustaría agendar una llamada de descubrimiento
2. Prefiero empezar con orientación por escrito

### Submit

- Botón: “ENVIAR”
- Producción usa POST por AJAX mediante Elementor Pro.
- Producción incluye reCAPTCHA v3 como control oculto.
- Los mensajes dinámicos de éxito y error no aparecen en el DOM inicial. Se
  definirán y verificarán con la solución aprobada en #72, sin usar producción
  como buzón de prueba.

## Qué pasa después

- H2: “Qué pasa después”
- Lista:
  1. “Revisamos tu mensaje personalmente”
  2. “Respondemos dentro de 1 a 2 días hábiles”
