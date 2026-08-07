<?php
/**
 * Valida contratos estructurales del theme sin cargar WordPress.
 *
 * @package Vicunav
 */

declare(strict_types=1);

$theme_root = dirname( __DIR__ );
$errors     = array();

/**
 * Registra un error de validación.
 *
 * @param string $message Mensaje legible.
 */
function vicunav_validation_error( string $message ): void {
	global $errors;

	$errors[] = $message;
}

/**
 * Lee y valida un archivo JSON.
 *
 * @param string $path Ruta absoluta.
 * @return array
 */
function vicunav_read_json( string $path ): array {
	if ( ! is_readable( $path ) ) {
		vicunav_validation_error( 'No se puede leer: ' . $path );
		return array();
	}

	try {
		$data = json_decode( (string) file_get_contents( $path ), true, 512, JSON_THROW_ON_ERROR );
	} catch ( JsonException $exception ) {
		vicunav_validation_error( 'JSON inválido en ' . $path . ': ' . $exception->getMessage() );
		return array();
	}

	return is_array( $data ) ? $data : array();
}

$required_paths = array(
	'style.css',
	'theme.json',
	'functions.php',
	'templates/index.html',
	'templates/front-page.html',
	'templates/page-home.html',
	'templates/page-services-en.html',
	'templates/page-servicios.html',
	'templates/page-portafolio.html',
	'templates/page-contacto.html',
	'parts/header.html',
	'parts/footer.html',
	'parts/header-en.html',
	'parts/footer-en.html',
	'languages/en_US.po',
	'languages/en_US.mo',
	'inc/assets.php',
	'inc/dependencies.php',
	'inc/editor.php',
	'inc/multilingual.php',
	'config/polylang/languages.json',
	'bin/setup-polylang.php',
	'config/contact-form-7/contacto-es.json',
	'bin/setup-contacto.php',
);

foreach (
	array(
		'hero-en.php',
		'situaciones-en.php',
		'como-ayudamos-intro-en.php',
		'como-ayudamos-en.php',
		'testimonio-destacado-en.php',
		'resultados-en.php',
		'deberia-sentirse-como-tu-en.php',
		'conoce-a-mario-en.php',
		'marcas-en.php',
		'cta-final-en.php',
		'servicios-hero-en.php',
		'servicios-paquete-esencial-en.php',
		'servicios-paquete-completo-en.php',
		'servicios-beneficios-en.php',
		'servicios-proceso-en.php',
		'servicios-mantenimiento-en.php',
		'servicios-adicionales-en.php',
		'servicios-faq-en.php',
		'servicios-cta-en.php',
	) as $english_pattern
) {
	$required_paths[] = 'patterns/' . $english_pattern;
}

foreach ( $required_paths as $relative_path ) {
	if ( ! is_file( $theme_root . '/' . $relative_path ) ) {
		vicunav_validation_error( 'Falta el archivo requerido: ' . $relative_path );
	}
}

$theme_json = vicunav_read_json( $theme_root . '/theme.json' );

if ( 3 !== ( $theme_json['version'] ?? null ) ) {
	vicunav_validation_error( 'theme.json debe usar la versión 3.' );
}

$font_sizes    = $theme_json['settings']['typography']['fontSizes'] ?? array();
$spacing_sizes = $theme_json['settings']['spacing']['spacingSizes'] ?? array();

foreach (
	array(
		'tamaños tipográficos' => $font_sizes,
		'espaciados'           => $spacing_sizes,
	) as $label => $presets
) {
	$slugs = array_column( $presets, 'slug' );

	if ( count( $slugs ) !== count( array_unique( $slugs ) ) ) {
		vicunav_validation_error( 'Hay slugs duplicados en ' . $label . '.' );
	}
}

$pattern_files = glob( $theme_root . '/patterns/*.php' ) ?: array();
$pattern_slugs = array();

if ( count( $pattern_files ) < 10 ) {
	vicunav_validation_error( 'El inventario debe incluir al menos diez patterns.' );
}

foreach ( $pattern_files as $pattern_file ) {
	$content = (string) file_get_contents( $pattern_file );

	foreach ( array( 'Title:', 'Slug:', 'Categories:', 'Block Types:' ) as $header ) {
		if ( ! str_contains( $content, $header ) ) {
			vicunav_validation_error( basename( $pattern_file ) . ' no declara ' . $header );
		}
	}

	if ( preg_match( '/^[ \t*]*Slug:\s*([^\s]+)/m', $content, $matches ) ) {
		$pattern_slugs[] = $matches[1];
	}
}

if ( count( $pattern_slugs ) !== count( array_unique( $pattern_slugs ) ) ) {
	vicunav_validation_error( 'Hay slugs de patterns duplicados.' );
}

$style_files = glob( $theme_root . '/styles/*/*.json' ) ?: array();

foreach ( $style_files as $style_file ) {
	$style = vicunav_read_json( $style_file );

	if ( empty( $style['slug'] ) || empty( $style['title'] ) || empty( $style['blockTypes'] ) ) {
		vicunav_validation_error( basename( $style_file ) . ' no define slug, title y blockTypes.' );
	}
}

$runtime_paths = array(
	$theme_root . '/functions.php',
	$theme_root . '/inc',
	$theme_root . '/parts',
	$theme_root . '/patterns',
	$theme_root . '/templates',
	$theme_root . '/theme.json',
	$theme_root . '/style.css',
);
$sensitive_patterns = array(
	'/-----BEGIN (?:RSA |EC |OPENSSH )?PRIVATE KEY-----/',
	'/\bgh[oprsu]_[A-Za-z0-9_]{20,}\b/',
	'/\b(?:sk|pk)_(?:live|test)_[A-Za-z0-9]{16,}\b/',
	'#/(?:Users|home)/[^/\s]+/#',
);

foreach ( $runtime_paths as $runtime_path ) {
	$files = is_dir( $runtime_path )
		? new RecursiveIteratorIterator( new RecursiveDirectoryIterator( $runtime_path, FilesystemIterator::SKIP_DOTS ) )
		: array( new SplFileInfo( $runtime_path ) );

	foreach ( $files as $file ) {
		if ( ! $file instanceof SplFileInfo || ! $file->isFile() ) {
			continue;
		}

		$content = (string) file_get_contents( $file->getPathname() );

		foreach ( $sensitive_patterns as $pattern ) {
			if ( preg_match( $pattern, $content ) ) {
				vicunav_validation_error( 'Contenido sensible o ruta local en ' . $file->getPathname() );
			}
		}
	}
}

if ( $errors ) {
	foreach ( $errors as $error ) {
		fwrite( STDERR, 'ERROR: ' . $error . PHP_EOL );
	}

	exit( 1 );
}

printf(
	"Theme válido: %d patterns, %d section styles, %d tamaños tipográficos y %d espaciados.\n",
	count( $pattern_files ),
	count( $style_files ),
	count( $font_sizes ),
	count( $spacing_sizes )
);
