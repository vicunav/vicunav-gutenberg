# Spec: Servicios en inglés

Issue: #89

Estado: Approved

## Resultado

Publicar la traducción de Servicios en
`/en/website-design-for-therapists-and-wellness-practices/`, relacionada con
`/servicios/`, usando la composición, assets y tokens aprobados en español.

## Alcance

- página inglesa con locale `en_US` y template `page-services-en`;
- nueve variantes EN derivadas de los patterns españoles;
- paquetes, beneficios, proceso, mantenimiento, adicionales, FAQ y CTA final;
- enlaces de Contacto dependientes del locale;
- relación ES/EN idempotente mediante Polylang;
- QA de frontend, FSE, responsive, accesibilidad y rendimiento.

Contacto EN, Portafolio EN y cambios de diseño quedan fuera de alcance.

## Criterios de aceptación

1. La ruta inglesa responde con `lang="en-US"` y conserva las nueve secciones.
2. El selector conecta Servicios ES y EN en ambos sentidos.
3. El copy coincide con `content-inventory.md` y no depende del sitio histórico.
4. Los CTA ingleses usan `/en/contact/`; los españoles conservan `/contacto/`.
5. El template no muestra el título administrativo y abre sin bloques inválidos
   en el Editor del sitio.
6. No se añaden tokens, assets remotos, bloques custom ni CSS específico.
7. Servicios ES no cambia visual ni estructuralmente.
