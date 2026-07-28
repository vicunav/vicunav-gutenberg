# Brief de migración: <página>

Issue padre: #<número><br>
Spec: `specs/<issue>-<slug>/spec.md`<br>
Última actualización: AAAA-MM-DD

> Mantener este archivo compacto. Registra hechos consultados repetidamente y
> enlaza evidencia extensa; no duplica el spec ni `qa.md`.

## Identidad y estado

| Campo | Valor |
|---|---|
| Referencia de solo lectura | |
| URL local | |
| Template | |
| Estado estable de referencia | |
| Usuario de captura | Anónimo / autenticado |
| Viewports | 390×844, 768×1024, 1440×900 |

## Reutilización

| Elemento existente | Ruta/token | Decisión |
|---|---|---|
| Header | `parts/header.html` | Reutilizar |
| Footer | `parts/footer.html` | Reutilizar |
| | | |

## Mapa de página

| Orden | Sección | Pattern | Fondo | Desktop | Móvil | Issue |
|---:|---|---|---|---|---|---:|
| 1 | | `vicunav/<slug>` | | | | # |

## Medidas globales

| Control | Desktop | Móvil | Nota |
|---|---:|---:|---|
| Ancho útil | | | |
| Gutter | | | |
| Ancho máximo | | | |
| Alto de `main` | | | Excluir admin bar |

## Inventario visual por sección

| Sección | Alto desktop | Alto móvil | Columnas/orden | Imagen/crop | Wrapping crítico |
|---|---:|---:|---|---|---|
| | | | | | |

## Assets

| Asset | Fuente | Local | Dimensiones | Carga | Alt/rol |
|---|---|---|---|---|---|
| | | | | eager / lazy | |

La fuente, licencia y checksum definitivos viven en
`assets/images/SOURCES.md`.

## Tokens y excepciones

- Superficies:
- Tipografía:
- Espaciados:
- CSS estructural local:
- Candidato a token nuevo y justificación:

## Responsive

- Cambios de orden:
- Cambios de alineación:
- Cambios de crop:
- Estados de controles:
- Breakpoints observados:

## Movimiento

- Estado visual final:
- Animaciones observadas:
- Incluidas o fuera de alcance:
- Comportamiento con `prefers-reduced-motion` si aplica:

## Ledger de paridad

| Sección | Contenido | Macro desktop | Móvil | Detalle | Editor | Estado |
|---|---|---|---|---|---|---|
| | Pending | Pending | Pending | Pending | Pending | Blocked |

## Decisiones y preguntas

| Fecha | Hecho/decisión | Fuente |
|---|---|---|
| | | |

No iniciar implementación con una pregunta que cambie layout, contenido, asset
o comportamiento.

## Evidencia

- Baseline:
- Regresión:
- Métricas:
- PR:
