# Rendimiento

## Objetivos de usuario

En el percentil 75 de datos de campo:

| Métrica | Objetivo “good” |
|---|---:|
| LCP | ≤ 2.5 s |
| INP | ≤ 200 ms |
| CLS | ≤ 0.1 |

Lighthouse es una herramienta de laboratorio, no reemplaza datos reales. Para desarrollo, mantener Performance ≥ 90 en móvil y evitar cualquier regresión significativa respecto a la baseline del mismo entorno.

## Presupuestos iniciales del homepage

- JavaScript propio en Fase 1: `0 KB`, salvo spec aprobado.
- Fuentes descargadas en carga inicial: ≤ 250 KB transferidos.
- Imagen hero: ≤ 250 KB y dimensiones intrínsecas declaradas.
- Imágenes no críticas: lazy-load nativo cuando WordPress lo permita.
- Sin recursos de terceros necesarios para el primer render.
- Sin layout shifts provocados por imágenes, fuentes, admin bar o navegación.
- Cada asset nuevo debe justificar peso, formato y uso.

Estos presupuestos se recalibran con una baseline versionada; no se relajan para hacer pasar una regresión.

## Estrategia

### CSS y bloques

- Preferir `theme.json` y estilos por bloque para que WordPress cargue solo lo necesario.
- Evitar frameworks CSS, resets duplicados y selectores profundos.
- No usar `!important` salvo una incompatibilidad documentada.
- Mantener paridad editor/frontend sin duplicar hojas completas.

### Fuentes

- Self-hosted, WOFF2 y con licencia incluida.
- Subset latino/latino extendido que cubra el contenido real.
- Solo pesos y estilos usados above-the-fold.
- `font-display` definido conscientemente.
- Preload únicamente de la fuente crítica comprobada; un preload incorrecto compite con LCP.

Las TTF actuales son una baseline funcional, no el formato objetivo de release. La conversión/subsetting a WOFF2 debe ser un issue de rendimiento con comparación visual.

### Imágenes

- Elegir AVIF/WebP para raster cuando el flujo lo soporte.
- Exportar cerca del tamaño máximo renderizado; no escalar imágenes enormes por CSS.
- Incluir `width` y `height` o `aspect-ratio`.
- Hero/LCP no usa lazy-load; imágenes posteriores sí.
- `srcset` y `sizes` deben corresponder al layout.
- No codificar imágenes grandes en base64 dentro de markup o CSS.

### JavaScript

- Usar interactividad nativa de bloques antes que scripts propios.
- Cargar solo en la vista que lo necesita y con dependencias declaradas.
- Evitar listeners globales, tareas largas e hidratación innecesaria.
- Respetar reduced motion y limpiar listeners si se añade comportamiento dinámico.

### Backend

- El theme no realiza queries personalizadas ni llamadas HTTP en render sin spec.
- Probar con cache fría/caliente y usuario anónimo/autenticado.
- Perfilado de servidor y caching pertenecen a infraestructura, pero sus resultados son parte del release.

## Medición reproducible

Registrar URL, commit, viewport, navegador, throttling, cache, usuario y mediana de al menos tres corridas. Comparar local con local; staging con staging. Investigar LCP por fases: TTFB, discovery, descarga y render.

Fuentes: [Core Web Vitals](https://web.dev/articles/vitals), [umbrales oficiales](https://web.dev/articles/defining-core-web-vitals-thresholds), [optimización de WordPress](https://developer.wordpress.org/advanced-administration/performance/optimization/) y [theme.json para themes eficientes](https://developer.wordpress.org/news/2022/12/leveraging-theme-json-and-per-block-styles-for-more-performant-themes/).
