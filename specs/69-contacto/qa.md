# QA: página de Contacto

Issue padre: #69<br>
Estado: baseline aprobado; implementación bloqueada por #72<br>
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
| Introducción | Pass | Baseline | Baseline | N/A | Pending | Blocked |
| Formulario | Pass | Baseline | Baseline | Pending | Pending | Blocked by #72 |
| Qué pasa después | Pass | Baseline | Baseline | N/A | Pending | Blocked |

## Evidencia

`docs/qa/evidence/contacto/baseline/`
