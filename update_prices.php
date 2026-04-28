<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

foreach (\App\Models\backend\rooms::all() as $room) {
    // Generate a random price between 4000 and 15000, rounded to nearest 500
    // rand(8, 30) * 500 produces 4000, 4500, 5000, ..., 15000
    $room->price = rand(8, 30) * 500;
    $room->save();
}

echo "All room prices updated and rounded off.";
