<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';

$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

echo "Laravel DB Connection: ".config('database.default').PHP_EOL;
echo "Laravel DB Host: ".config('database.connections.mysql.host').PHP_EOL;
echo "Laravel DB Port: ".config('database.connections.mysql.port').PHP_EOL;