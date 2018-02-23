<?php
/**
 * Created by Miguel Lobo <wmaster732@gmail.com>
 */

use Illuminate\Database\Capsule\Manager as Database;

$db = new Database;

$db->addConnection([
    'driver'    => env('DB_CONNECTION', 'mysql'),
    'host'      => env('DB_HOST', '127.0.0.1'),
    'database'  => env('DB_DATABASE', 'forge'),
    'username'  => env('DB_USERNAME', 'forge'),
    'password'  => env('DB_PASSWORD', ''),
    'charset'   => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
]);

$db->setAsGlobal();
    
$db->bootEloquent();
