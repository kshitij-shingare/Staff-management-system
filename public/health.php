<?php
// Diagnostic health check - remove after debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h2>Health Check</h2>";

// Check PHP version
echo "<p>PHP: " . phpversion() . "</p>";

// Check if .env exists
$envPath = __DIR__ . '/../.env';
echo "<p>.env exists: " . (file_exists($envPath) ? 'YES' : 'NO') . "</p>";

if (file_exists($envPath)) {
    $env = file_get_contents($envPath);
    // Show key env vars (redacted)
    preg_match('/APP_DEBUG=(.*)/', $env, $m);
    echo "<p>APP_DEBUG: " . ($m[1] ?? 'not set') . "</p>";
    preg_match('/APP_KEY=(.*)/', $env, $m);
    echo "<p>APP_KEY set: " . (!empty($m[1]) ? 'YES (' . strlen($m[1]) . ' chars)' : 'NO') . "</p>";
    preg_match('/DB_CONNECTION=(.*)/', $env, $m);
    echo "<p>DB_CONNECTION: " . ($m[1] ?? 'not set') . "</p>";
    preg_match('/DB_DATABASE=(.*)/', $env, $m);
    echo "<p>DB_DATABASE: " . ($m[1] ?? 'not set') . "</p>";
}

// Check storage dirs
$dirs = [
    'storage/framework/sessions',
    'storage/framework/views', 
    'storage/framework/cache/data',
    'storage/logs',
    'bootstrap/cache',
];
echo "<h3>Directory Check</h3>";
foreach ($dirs as $dir) {
    $path = __DIR__ . '/../' . $dir;
    $exists = is_dir($path);
    $writable = $exists && is_writable($path);
    echo "<p>$dir: " . ($exists ? 'EXISTS' : 'MISSING') . " / " . ($writable ? 'WRITABLE' : 'NOT WRITABLE') . "</p>";
}

// Check database
$dbPath = __DIR__ . '/../database/database.sqlite';
echo "<h3>Database</h3>";
echo "<p>SQLite file exists: " . (file_exists($dbPath) ? 'YES (' . filesize($dbPath) . ' bytes)' : 'NO') . "</p>";
echo "<p>SQLite writable: " . (is_writable($dbPath) ? 'YES' : 'NO') . "</p>";

// Check vendor
echo "<h3>Vendor</h3>";
echo "<p>vendor/autoload.php: " . (file_exists(__DIR__ . '/../vendor/autoload.php') ? 'YES' : 'NO') . "</p>";

// Try booting Laravel and catch the error
echo "<h3>Laravel Boot Test</h3>";
try {
    require __DIR__ . '/../vendor/autoload.php';
    $app = require_once __DIR__ . '/../bootstrap/app.php';
    $kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
    $kernel->bootstrap();
    echo "<p style='color:green'>Laravel booted successfully!</p>";
    echo "<p>App ENV: " . app()->environment() . "</p>";
    echo "<p>Debug: " . (config('app.debug') ? 'true' : 'false') . "</p>";
} catch (\Throwable $e) {
    echo "<p style='color:red'>BOOT ERROR: " . htmlspecialchars($e->getMessage()) . "</p>";
    echo "<pre>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
}
