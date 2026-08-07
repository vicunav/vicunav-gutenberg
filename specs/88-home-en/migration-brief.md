# Migration brief: Home en inglés

Issue: #88

## Fuente y límites

- fuente normativa: `specs/1-clon-homepage/content-inventory.md`;
- referencia visual: Home ES local aprobada;
- producción y la antigua Home EN: solo referencia, no fuente de copy;
- ruta: `/en/home/`;
- locale: `en_US`;
- relación: `/` ↔ `/en/home/`.

## Mapa de composición

El orden es idéntico a `templates/front-page.html`: header, Hero, Situations,
How We Help, Process, testimonial, Results, authenticity, Mario, brands, final
CTA y footer. Cada sección reutiliza su pattern español con el catálogo inglés.

Header y footer usan partes inglesas separadas porque Polylang Free no ofrece
traducción de template parts en FSE. No se enlaza Portafolio desde inglés hasta
que tenga una traducción aprobada.

## Riesgos y controles

- wrapping más largo: comparar 320, 390, 768 y 1440 px sin crear tokens;
- enlaces futuros de Servicios y Contacto: conservar las rutas aprobadas del
  lote y verificarlas integralmente en #91;
- locale incorrecto en FSE: la variante EN fuerza `en_US` solo mientras genera
  el pattern y restaura el locale inmediatamente;
- regresión ES: comparar estructura, copy y rutas de `/` antes y después.
