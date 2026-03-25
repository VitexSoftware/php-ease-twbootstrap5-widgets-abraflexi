<?php
// Autoloader shim for package: php-vitexsoftware-ease-bootstrap5-widgets-abraflexi
// Includes dependency autoloaders if present and registers PSR-4 for project classes.

require_once '/usr/share/php/EaseTWB5/autoload.php';
require_once '/usr/share/php/EaseTWB5WidgetsAbraFlexi//autoload.php';

// Register PSR-4 autoloader for AbraFlexi\ui\TWB5\ namespace
spl_autoload_register(function ($class) {
    $prefix = 'AbraFlexi\\ui\\TWB5\\';
    $base_dir = __DIR__ . '/src/AbraFlexi/ui/TWB5/';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative = substr($class, $len);
    $file = $base_dir . str_replace('\\\\', '/', $relative) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

return;
