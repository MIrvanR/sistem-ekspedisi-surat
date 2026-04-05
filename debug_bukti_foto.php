<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
foreach (\App\Models\Ekspedisi::all() as $e) {
    echo $e->id . ' => ' . ($e->bukti_foto ?? 'NULL') . "\n";
}
