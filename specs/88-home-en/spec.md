# Spec: Home en inglés

Issue: #88

Estado: Approved

## Resultado

Publicar la traducción de Home en `/en/home/`, relacionada con `/`, usando la
composición, assets y tokens de la portada española. El copy parte únicamente
del inventario aprobado de `specs/1-clon-homepage/content-inventory.md`.

## Alcance

- página `Home` con locale `en_US` y template `page-home`;
- diez variantes inglesas de los patterns de la portada;
- header y footer ingleses sin enlaces que cambien silenciosamente a español;
- relación ES/EN idempotente mediante Polylang;
- frontend, Editor del sitio, responsive, accesibilidad y rendimiento.

Quedan fuera de alcance Portafolio EN, Servicios EN, Contacto EN y cambios de
diseño. Sus rutas ya aprobadas pueden aparecer como destinos del lote.

## Criterios de aceptación

1. `/en/home/` responde con `lang="en-US"` y conserva la jerarquía de la Home ES.
2. El selector conecta `/` con `/en/home/` en ambos sentidos.
3. El copy coincide con `content-inventory.md` y no usa la Home EN histórica.
4. Los enlaces ingleses permanecen bajo `/en/`; Portafolio no aparece mientras
   no exista una traducción aprobada.
5. El template no muestra el título administrativo y se puede abrir en FSE.
6. No se añaden tokens, assets remotos, bloques custom ni CSS específico.
7. La Home ES no cambia visual ni estructuralmente.
