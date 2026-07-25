# Evidencia de rendimiento: portada de Fase 1

Issue: #15<br>
Commit probado: `30c1a96`<br>
Baseline comparable: `75ae531`<br>
Fecha: 2026-07-25<br>
Responsable: @mariovicunadev

## Entorno y método

- URL: `https://vicunav-gutenberg.local/`
- WordPress: 7.0.2 en LocalWP
- Herramienta: Lighthouse 13.4.1, categoría Performance
- Perfil: móvil predeterminado de Lighthouse
- Navegador: Chrome headless con certificado local permitido
- Usuario: anónimo
- Corridas: tres por condición; se reporta la mediana
- Cache fría: perfil efímero y limpieza predeterminada de Lighthouse
- Cache caliente: una corrida de calentamiento y tres mediciones con el mismo perfil persistente y `--disable-storage-reset`

Comando frío:

```bash
npx --yes lighthouse@13.4.1 https://vicunav-gutenberg.local/ \
  --only-categories=performance \
  --output=json \
  --chrome-flags="--headless --ignore-certificate-errors --no-sandbox" \
  --quiet
```

La serie caliente añade `--disable-storage-reset` y reutiliza el mismo `--user-data-dir` temporal. Los reportes completos permanecen como artefactos locales efímeros; [lighthouse-summary.json](lighthouse-summary.json) conserva los resultados necesarios para auditar la conclusión.

## Resultados

| Condición | Performance | FCP | LCP | CLS | TBT | Transferencia | Requests |
|---|---:|---:|---:|---:|---:|---:|---:|
| Baseline fría `75ae531` | 58 | 5.552 ms | 8.252 ms | 0 | 228 ms | 1.907.159 bytes | 36 |
| Optimizada fría `30c1a96` | 84 | 2.252 ms | 3.376 ms | 0,0755 | 223 ms | 607.484 bytes | 23 |
| Optimizada caliente `30c1a96` | **90** | **1.044 ms** | **1.048 ms** | **0,0755** | **355 ms** | **22.907 bytes** | **23** |

La condición caliente cumple el objetivo Lighthouse móvil ≥ 90. La medición fría mejora 26 puntos respecto a la baseline comparable y reduce el LCP en 4.876 ms; su score conserva variación por el momento en que WordPress ejecuta el módulo nativo de interactividad de `core/navigation`. Este módulo es necesario para el menú móvil y se conserva en lugar de sustituirlo por JavaScript propio.

## Presupuestos y assets

| Control | Baseline | Resultado | Veredicto |
|---|---:|---:|---|
| Fuentes iniciales | 940.749 bytes, cinco TTF | 238.137 bytes, cinco WOFF2 | Pass: ≤ 250 KB |
| Hero/LCP | 45.092 bytes | 45.092 bytes, preload, `eager`, prioridad alta, 1536×1024 | Pass: ≤ 250 KB |
| Logos de marcas | 294.450 bytes | 73.028 bytes | Pass |
| JavaScript propio del theme | 0 bytes | 0 bytes | Pass |
| Recursos HTTP de terceros | 0 | 0 | Pass |

Las seis caras disponibles usan WOFF2 local y `font-display: swap`. Solo se descargan las cinco necesarias en la portada; no se precarga una fuente sin evidencia porque competiría con el asset LCP. El hero sí se precarga desde `<head>` y Lighthouse confirma que es descubrible de inmediato, no usa lazy-load y lleva `fetchpriority="high"`.

Los 20 elementos `<img>` tienen `width`, `height` y `decoding="async"`. El logo y el hero son los dos únicos assets eager; las 18 imágenes restantes usan lazy-load. Una prueba de scroll progresivo confirmó que todas completan su carga y que el documento conserva cero overflow horizontal.

## CLS y navegación

El CLS medido es 0,0755, dentro del objetivo ≤ 0,1. Lighthouse atribuye el movimiento al logo aunque el DOM auditado contiene `width="554"`, `height="113"` y el contenedor reserva la relación 554/113. La verificación manual en 390×844 y 1440×1000 confirmó geometría estable y sin cambio visual respecto a la evidencia aprobada.

El TBT caliente sube frente a la serie fría porque el módulo de interactividad se ejecuta durante la ventana de medición, pero permanece muy por debajo del umbral deficiente de Lighthouse. No se difiere artificialmente: hacerlo retrasaría la disponibilidad del menú móvil y falsearía la experiencia real.

## Decisión sobre el video del testimonio

Producción reproduce `Mario-Vicuna-Tati-Pilates.mp4`, de 112.225.142 bytes. El inventario contractual de Fase 1 no exige reproducción de video y ya excluye efectos de Elementor; el theme conserva el poster local equivalente, que mantiene la composición visual sin incorporar una descarga desproporcionada.

Para añadir movimiento en una fase futura se requiere un issue nuevo con fuente optimizada, poster, captions si hay voz, controles accesibles, política de autoplay y presupuesto aprobado. El MP4 de producción no entra al artefacto de Fase 1.

## Veredicto

**Pass para #15.** La portada cumple el presupuesto caliente, mejora de forma material y reproducible la baseline fría, no añade JavaScript propio ni terceros, y deja explícitas las decisiones de carga y el único factor de variación residual.
