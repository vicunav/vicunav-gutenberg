# Migration brief: Servicios en inglés

Issue: #89

## Fuente y límites

- fuente normativa: `specs/2-servicios/content-inventory.md`;
- referencia visual: Servicios ES local aprobada;
- producción y la versión inglesa histórica: solo referencia;
- ruta: `/en/website-design-for-therapists-and-wellness-practices/`;
- locale: `en_US`;
- relación: `/servicios/` con su ruta EN equivalente.

## Mapa de composición

El orden es idéntico a `templates/page-servicios.html`: header, hero, paquete
Esencial, paquete Completo, beneficios, proceso, mantenimiento, adicionales,
FAQ, CTA y footer. Cada sección reutiliza el pattern español bajo locale inglés.

## Riesgos y controles

- copy largo y 17 FAQ: verificar reflow y acordeones en cuatro viewports;
- enlaces a Contacto aún no aprovisionado: usar la ruta aprobada y comprobarla
  integralmente al completar #90 y #91;
- locale incorrecto en FSE: forzar `en_US` solo durante la materialización;
- regresión ES: comparar estructura, copy y destinos antes y después.
