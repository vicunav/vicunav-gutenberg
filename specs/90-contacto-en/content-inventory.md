# Inventario bilingüe: Contacto

Issue: #90

Estado: Approved

Fuente española: `specs/69-contacto/content-inventory.md`. La columna EN es el
copy normativo de esta entrega.

## Introducción

| Elemento | EN |
|---|---|
| Eyebrow | Let's Get Started |
| H1 | The first step is simple |
| Párrafo | This short form helps us understand where you are and how we can best guide you from there. |

## Formulario

| # | Label EN | Tipo | Requerido | Placeholder o valor inicial |
|---:|---|---|---|---|
| 1 | Full name | text | Sí | Full name |
| 2 | Email address | email | Sí | Email address |
| 3 | Type of business or practice | select | Sí | Coach or consultant |
| 4 | Do you currently have a website? | select | Sí | Yes |
| 5 | Which of these situations best describes you? | select | No | I am starting from scratch |
| 6 | How would you prefer to continue? | select | No | I would like to schedule a discovery call |
| 7 | What are you hoping to get help with right now? | textarea | No | Write here... |
| 8 | Is there anything you would like us to know before we reply? | textarea | No | Write here... |

### Opciones

- Tipo: `Coach or consultant`; `Therapist or mental health professional`;
  `Wellness or lifestyle professional`; `Trainer or educator`; `Independent
  professional`; `Small service business`; `Other`.
- Sitio actual: `Yes`; `No`.
- Situación: `I am starting from scratch`; `My current website no longer
  reflects my work`; `I need more clarity and structure`; `I am not sure yet,
  but I feel stuck`; `Other`.
- Próximo paso: `I would like to schedule a discovery call`; `I prefer to start
  with written guidance`.
- Submit: `SEND`.

Los requeridos anuncian `(required)` para lectores de pantalla. El formulario
tiene el nombre accesible `Form to start a project with Vicunav`.

## Mensajes principales

- Éxito: `Thank you for contacting us. We received your message and will reply within 1 to 2 business days.`
- Error de entrega: `We could not send your message. Please try again or email hello@vicunav.com.`
- Validación: `One or more fields have errors. Please review them and try again.`
- Spam: `We could not verify your submission. Refresh the page and try again.`
- Requerido: `Please complete this field.`
- Email: `Please enter a valid email address.`

Los demás mensajes estándar de CF7 se traducen directamente y se versionan en
`config/contact-form-7/contact-en.json`.

## Qué pasa después

- H2: `What Happens Next`
- `We review your message personally`
- `We reply within 1 to 2 business days`
