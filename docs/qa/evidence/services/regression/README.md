# Regresión local de Servicios

URL: `https://vicunav-gutenberg.local/servicios/`
Fecha: 2026-07-27
Issue: #61

## Resultado

La plantilla local se comparó contra el baseline de producción sección por sección. Se conservaron estructura, copy, jerarquía, familias, paleta, texturas y recursos editoriales. Las animaciones de entrada de Elementor se omiten deliberadamente; no forman parte del estado final del diseño.

| Control | Resultado |
|---|---|
| HTTP y template | 200; `page-servicios.html`; nueve secciones |
| Semántica | Un H1; H2 por sección; 17 bloques Details |
| Título de entrada | Ausente en frontend y en el lienzo del Editor del sitio |
| Reflow | Sin overflow a 305, 375, 753 y 1425 px útiles |
| Assets | Cero fallos; cero hotlinks; 1.022.426 bytes locales |
| Gutenberg | Nueve patterns registrados; 174 bloques semánticos visibles en el template |
| Teclado | FAQ alterna con Enter y conserva el foco |
| Accesibilidad | Lighthouse 100 |
| Best Practices | Lighthouse 100 |
| SEO técnico | Lighthouse 92; falta de meta description queda en la capa de contenido/SEO |

## Evidencia visual

- `local-desktop-01.png` a `local-desktop-11.png`: recorrido completo a 1440×900.
- `local-mobile-01.png` a `local-mobile-13.png`: recorrido completo a 390×844.
- [`metrics.json`](metrics.json): dimensiones, estructura, carga y resultados Lighthouse reproducibles.

La referencia equivalente está en `../baseline/`. Las capturas locales autenticadas muestran la barra administrativa de WordPress; se excluye de la comparación de la composición del theme.

## Rendimiento

Se ejecutaron tres pasadas Lighthouse en LocalWP. La primera incluyó una tarea no atribuible de 6,1 s durante el arranque frío de Chromium/LocalWP; las dos pasadas estabilizadas obtuvieron 89 y 93. La mediana registrada es 89, con TBT estabilizado de 183 ms y CLS de 0,0127. No se atribuyó JavaScript propio: el theme no añade scripts.

Los recursos del hero se cargan eager/high y el fondo LCP se precarga únicamente en `/servicios/`. Las demás imágenes usan lazy loading y dimensiones intrínsecas declaradas.
# Regresión visual — Servicios

Evidencia de la comparación de `https://vicunav-gutenberg.local/servicios/`
contra `https://vicunav.com/servicios/`.

La segunda pasada visual normaliza:

- composición y saltos editoriales del hero;
- panel compartido, jerarquía y ritmo de los paquetes;
- proporciones de tarjetas en Beneficios y pasos del Proceso;
- distribución de Mantenimiento y Servicios adicionales;
- densidad y estado inicial del acordeón de FAQ.

Las alturas por sección de la implementación y de la referencia se registran en
`metrics.json`. También se verificaron reflow sin desbordamiento horizontal,
un solo `h1`, 17 elementos `details`, 25 imágenes del theme cargadas y cero
hotlinks.

La ausencia de animaciones de entrada por scroll es intencional: `AGENTS.md`
las deja fuera de esta fase para conservar una implementación nativa y
predecible antes de evaluar movimiento accesible como mejora posterior.
