# Architecture Decision Records

Crear un ADR para decisiones transversales, costosas o difíciles de revertir: compatibilidad mínima, dependencias, nuevo PHP/JavaScript, estrategia de assets, excepciones a bloques core o cambios de fuente de verdad.

Nombre: `NNNN-titulo-en-kebab-case.md`.

Estados: `Proposed`, `Accepted`, `Superseded`, `Deprecated`, `Rejected`.

Un ADR aceptado no se edita para cambiar su decisión. Una decisión posterior crea otro ADR y enlaza `Supersedes`/`Superseded by`.

## Plantilla

```markdown
# ADR NNNN: <título>

Estado: Proposed
Fecha: AAAA-MM-DD
Issue: #N

## Contexto

## Drivers de decisión

## Opciones consideradas

## Decisión

## Consecuencias

### Positivas

### Negativas

## Plan de validación y rollback

## Referencias
```
