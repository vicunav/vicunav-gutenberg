# Fuentes locales

Las cuatro familias se distribuyen bajo SIL Open Font License 1.1. Cada carpeta conserva su `OFL.txt`; los repositorios de autoría están indicados en la primera línea de esas licencias.

## Optimización de Fase 1

Fecha: 2026-07-25<br>
Herramienta: fontTools 4.63.0 + Brotli<br>
Formato de salida: WOFF2<br>
Comportamiento: `font-display: swap`

Red Hat Display y Bodoni Moda conservan Latin‑1, puntuación general y el símbolo de euro. Caveat y Gloock son acentos editoriales limitados al alfabeto, números, signos y diacríticos españoles requeridos por el contenido contractual. Las tablas OpenType y ejes variables necesarios se conservan.

Los TTF de origen se retiraron del artefacto final después de verificar geometría, cobertura y render; permanecen recuperables en el historial de Git.

| Archivo | Bytes | SHA-256 |
|---|---:|---|
| `red-hat-display/RedHatDisplay-Variable.woff2` | 31.052 | `be0f6cf7e71f3776bdb41ddf3237df338d4d6d525cb6a44dc2fc5b022b4eef0f` |
| `red-hat-display/RedHatDisplay-Italic-Variable.woff2` | 32.592 | `0b9a5f359e91833d5e33ae1d32c41b278534362923a269de6cec4f51c62536ba` |
| `bodoni-moda/BodoniModa-Variable.woff2` | 56.836 | `3383af5e499c0c0d2a349f697cfd366d2a5eb8fb48f96e4e7673823a0987906c` |
| `bodoni-moda/BodoniModa-Italic-Variable.woff2` | 67.636 | `92d4be349880024989fe692c43636b3ab6072fc35531d42d42d9cac78ac9d9e6` |
| `gloock/Gloock-Regular.woff2` | 18.604 | `3ad641540deedd48572288a5e96ab53f2bbbabd7343e5f79aca4fe54bdf5fa84` |
| `caveat/Caveat-Variable.woff2` | 62.544 | `826162904322bc5c5bafc141c66e21c4eff2bfc5f88559567860d98c4f2e95bd` |

La portada descarga cinco de estas seis caras: 238.172 bytes transferidos en la medición móvil fría. La itálica de Red Hat Display no se solicita en el homepage actual.
