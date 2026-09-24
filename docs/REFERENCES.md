# Referencias oficiales

Última revisión: 2026-07-27. Se priorizan fuentes normativas, handbooks oficiales y documentación de los proveedores de plataforma.

## WordPress y Gutenberg

- [Theme Handbook](https://developer.wordpress.org/themes/)
- [Theme Structure](https://developer.wordpress.org/themes/core-concepts/theme-structure/)
- [Templates](https://developer.wordpress.org/themes/templates/)
- [Block Stylesheets](https://developer.wordpress.org/themes/features/block-stylesheets/)
- [`wp_enqueue_block_style()`](https://developer.wordpress.org/reference/functions/wp_enqueue_block_style/)
- [Registering Patterns](https://developer.wordpress.org/themes/patterns/registering-patterns/)
- [theme.json Reference, versión 3](https://developer.wordpress.org/block-editor/reference-guides/theme-json-reference/)
- [WordPress Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/)
- [Testing themes](https://developer.wordpress.org/themes/advanced-topics/testing/)
- [Theme Review requirements](https://make.wordpress.org/themes/handbook/review/required/)
- [`@wordpress/env`](https://developer.wordpress.org/block-editor/reference-guides/packages/packages-env/)
- [WordPress Security APIs](https://developer.wordpress.org/apis/security/)
- [Sanitizing Data](https://developer.wordpress.org/apis/security/sanitizing/)
- [Escaping Data](https://developer.wordpress.org/apis/security/escaping/)
- [Nonces](https://developer.wordpress.org/apis/security/nonces/)
- [Performance and Optimization](https://developer.wordpress.org/advanced-administration/performance/optimization/)

## Spec-Driven Development y GitHub

- [GitHub Spec Kit](https://github.github.com/spec-kit/)
- [Spec-Driven Development de Spec Kit](https://github.com/github/spec-kit/blob/main/spec-driven.md)
- [GitHub Issues](https://docs.github.com/en/issues/tracking-your-work-with-issues)
- [Sub-issues](https://docs.github.com/en/issues/tracking-your-work-with-issues/using-issues/adding-sub-issues)
- [Issue dependencies](https://docs.github.com/en/issues/tracking-your-work-with-issues/using-issues/creating-issue-dependencies)
- [Keywords para enlazar y cerrar issues](https://docs.github.com/en/get-started/writing-on-github/working-with-advanced-formatting/using-keywords-in-issues-and-pull-requests)
- [Protected branches](https://docs.github.com/en/repositories/configuring-branches-and-merges-in-your-repository/managing-protected-branches/about-protected-branches)
- [Issue templates](https://docs.github.com/en/communities/using-templates-to-encourage-useful-issues-and-pull-requests/configuring-issue-templates-for-your-repository)
- [GitHub Actions secure use](https://docs.github.com/en/actions/reference/security/secure-use)

## Accesibilidad

- [WCAG 2.2, W3C Recommendation](https://www.w3.org/TR/WCAG22/)
- [What’s New in WCAG 2.2](https://www.w3.org/WAI/standards-guidelines/wcag/new-in-22/)
- [WordPress Accessibility Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/accessibility/)

## Rendimiento

- [Web Vitals](https://web.dev/articles/vitals)
- [Definición de umbrales Core Web Vitals](https://web.dev/articles/defining-core-web-vitals-thresholds)
- [Core Web Vitals workflows](https://web.dev/articles/vitals-tools)
- [Lighthouse](https://developer.chrome.com/docs/devtools/lighthouse/)

## Seguridad

- [OWASP Secure Headers Project](https://owasp.org/www-project-secure-headers/)
- [OWASP Content Security Policy](https://owasp.org/www-community/controls/Content_Security_Policy)
- [OWASP Web Security Testing Guide: CSP](https://owasp.org/www-project-web-security-testing-guide/latest/4-Web_Application_Security_Testing/02-Configuration_and_Deployment_Management_Testing/12-Test_for_Content_Security_Policy)

## Política de actualización

En cada release menor:

1. revisar cambios de WordPress y Gutenberg que afecten blocks, patterns o `theme.json`;
2. confirmar versión vigente de WCAG y Core Web Vitals;
3. revisar cambios de seguridad en WordPress y GitHub Actions;
4. actualizar enlaces movidos y la fecha de revisión;
5. abrir issues para cambios de comportamiento; no incorporarlos silenciosamente en documentación.
