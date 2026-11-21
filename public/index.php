
<?php

use CodeIgniter\Boot;
use Config\Paths;

/*
 * Verificar versión de PHP
 */

$minPhpVersion = '8.2';

if (version_compare(PHP_VERSION, $minPhpVersion, '<')) {
    $message = sprintf(
        'Your PHP version must be %s or higher to run CodeIgniter. Current version: %s',
        $minPhpVersion,
        PHP_VERSION,
    );

    header('HTTP/1.1 503 Service Unavailable.', true, 503);
    echo $message;
    exit(1);
}

/*
 * Directorio público
 */

define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);

if (getcwd() . DIRECTORY_SEPARATOR !== FCPATH) {
    chdir(FCPATH);
}

/*
 * Cargar configuración de rutas
 */

// Aplicación privada en alwaysdata
require '/home/galeria-erick2026/galeria_app/app/Config/Paths.php';

$paths = new Paths();

/*
 * Iniciar CodeIgniter
 */

require $paths->systemDirectory . '/Boot.php';

exit(Boot::bootWeb($paths));
