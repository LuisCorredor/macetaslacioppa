<?php
/**
 * Created by Miguel Lobo <wmaster732@gmail.com>
 */

/**
 * Registero del AutoLoader
 */
require __DIR__.'/../../vendor/autoload.php';

/**
 * Implementacion del .env
 */
$dotenv = new Dotenv\Dotenv(__DIR__.'/../../');
$dotenv->load();

function env($key, $value = null)
{
    return getenv($key) ?: $value;
}

/**
 * Inicio de ORM illuminate/database
 */
require_once __DIR__ . '/Conexion.php';

    