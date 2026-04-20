<?php
// Autoloader shim for package: php-vitexsoftware-ease-bootstrap5-widgets-abraflexi
// Includes dependency autoloaders if present and registers PSR-4 for project classes.

require_once '/usr/share/php/EaseTWB5/autoload.php';
require_once '/usr/share/php/AbraFlexiBricks/autoload.php';

// Register PSR-4 autoloader for AbraFlexi\ui\TWB5\ namespace
spl_autoload_register(function ($class) {
    $prefix = 'AbraFlexi\\ui\\TWB5\\';
    $base_dir = '/usr/share/php/EaseTWB5WidgetsAbraFlexi/';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

return;

require_once '/usr/share/php/Composer/InstalledVersions.php';

(function (): void {
    $versions = [];
    foreach (\Composer\InstalledVersions::getAllRawData() as $d) {
        $versions = array_merge($versions, $d['versions'] ?? []);
    }
    $name    = defined('APP_NAME')    ? APP_NAME    : 'unknown';
    $version = defined('APP_VERSION') ? APP_VERSION : '0.0.0';
    $versions[$name] = ['pretty_version' => $version, 'version' => $version,
        'reference' => null, 'type' => 'library', 'install_path' => __DIR__,
        'aliases' => [], 'dev_requirement' => false];
    \Composer\InstalledVersions::reload([
        'root' => ['name' => $name, 'pretty_version' => $version, 'version' => $version,
            'reference' => null, 'type' => 'project', 'install_path' => __DIR__,
            'aliases' => [], 'dev' => false],
        'versions' => $versions,
    ]);
})();
