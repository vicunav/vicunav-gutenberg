# Tareas: página de Servicios

Epic: #50
Spec: [`spec.md`](spec.md)
Plan: [`plan.md`](plan.md)

| ID | Issue | Resultado | Criterios | Dependencia |
|---|---:|---|---|---|
| S-01 | #51 | Especificación, baseline e inventario | AC-01 | `main` consolidado |
| S-02 | #52 | Hero | AC-02 | #51 |
| S-03 | #53 | Paquete Esencial | AC-03 | #52 |
| S-04 | #54 | Paquete Completo | AC-04 | #53 |
| S-05 | #55 | Beneficios | AC-05 | #54 |
| S-06 | #56 | Proceso | AC-06 | #55 |
| S-07 | #57 | Mantenimiento | AC-07 | #56 |
| S-08 | #58 | Opciones adicionales | AC-08 | #57 |
| S-09 | #59 | FAQ | AC-09 | #58 |
| S-10 | #60 | CTA, template, ruta y editor | AC-10 | #59 |
| S-11 | #61 | QA y release local | AC-11, AC-12 | #60 |

## Definition of Ready de un pattern

- Copy literal y referencia visual identificados.
- Asset requerido localizado o decisión explícita de reutilización.
- Dependencia anterior implementada.
- Criterio de aceptación y prueba proporcional definidos.
- No hay preguntas materiales abiertas.

## Integración

- [ ] Los nueve patterns están registrados y ensamblados en orden.
- [ ] La página local publicada usa la plantilla de Servicios.
- [ ] No se muestra el título de entrada en frontend ni como lienzo previo al diseño.
- [ ] El header y footer compartidos no se duplican.
- [ ] El QA cubre 320, 390, 768 y 1440 px.
- [ ] El árbol de bloques es editable y conserva la composición.
- [ ] El PR cierra #51–#61 y enlaza #50.
