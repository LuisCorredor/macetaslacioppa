<?php

session_start();

require_once __DIR__.'/Config/Kernel.php';
require_once __DIR__.'/Models/User.php';
require_once __DIR__.'/Models/Category.php';
require_once __DIR__.'/Models/Product.php';
require_once __DIR__.'/Models/ProductImages.php';
require_once __DIR__.'/Models/ProductMeasures.php';
require_once __DIR__.'/Models/News.php';
require_once __DIR__.'/Models/Tag.php';
require_once __DIR__.'/Models/JobApplication.php';
require_once __DIR__.'/Models/Service.php';

/**
 * Verificador de session activa 
 */
function authCheck()
{
    return isset($_SESSION['auth']);
}

/**
 * Notificacion activas para la vistas
 */
function notify($title, $type = null, $text = null)
{
    $flash = [
        'title' => $title,
        'type' => $type,
        'text' => $text,
    ];

    $_SESSION['flash'] = $flash;
}

/**
 * Carga de imahenes al sistema
 */
function uploadImages(Array $data, $src)
{
    if (!$data['name']) 
        notify('Error', 'error', 'El archivo no se pudo subir');
    elseif ($data['type'] != 'image/jpeg' && $data['type'] != 'image/png' && $data['type'] != 'image/gif') 
        notify('Atención', 'warning', 'El archivo no es una imagen');
    else
        if (is_uploaded_file($data['tmp_name']))
            move_uploaded_file($data['tmp_name'], $src);
}

/**
 * Carga de archivos al sistema
 */
function uploadFiles(Array $data, $src)
{
    if (is_uploaded_file($data['tmp_name'])){
        if (move_uploaded_file($data['tmp_name'], $src))
            notify('Éxito', 'success', 'El archivo se subio correctamanete');
    }
}

/**
 * Generar Str random
 */
function str_random()
{
    return chr(rand(97,122)) . chr(rand(97,122)) . chr(rand(97,122)) . chr(rand(97,122)).
    chr(rand(97,122)) . chr(rand(97,122)) . chr(rand(97,122)) . chr(rand(97,122));
}

/**
 * Generar Str slug
 */
function str_slug($string)
{
    $characters = [
        "Á" => "A", "Ç" => "c", "É" => "e", "Í" => "i", "Ñ" => "n", "Ó" => "o", "Ú" => "u", 
		"á" => "a", "ç" => "c", "é" => "e", "í" => "i", "ñ" => "n", "ó" => "o", "ú" => "u",
		"à" => "a", "è" => "e", "ì" => "i", "ò" => "o", "ù" => "u"
    ];

    $string = strtr($string, $characters); 
	$string = strtolower(trim($string));
	$string = preg_replace("/[^a-z0-9-]/", "-", $string);
	$string = preg_replace("/-+/", "-", $string);
 
	if(substr($string, strlen($string) - 1, strlen($string)) === "-") {
		$string = substr($string, 0, strlen($string) - 1);
	}
 
	return $string;
}

function paginator($data, $get, $per_page)
{

    $total = $data->count();

    $current_page = isset($get['page']) ? $get['page'] : 1;

    $last_page = ceil($total / $per_page);

    $offset = ($current_page - 1)  * $per_page;
    $from = $offset + 1;
    $to = min(($offset + $per_page), $total);

    $dat = [];

    foreach ($data as $key => $value) {
        if ($key+1 >= $from && $key+1 <= $to)
            $dat[] = $value;
    }

    $paginator = [
        'total'         => $total,
        'per_page'      => $per_page,
        'current_page'  => $current_page,
        'last_page'     => $last_page,
        'from'          => $from,
        'to'            => $to,
        'prev_page_url' => null,
        'next_page_url' => null,
        'data'          => $dat,
    ];

    $str = dataGetUri($get);

    if ($current_page > 1) {
        $prev = $current_page - 1;
        $paginator['prev_page_url'] = '?page='.$prev.$str;
    }

    if ($current_page != $last_page) {
        $next = $current_page + 1;
        $paginator['next_page_url'] = '?page='.$next.$str;
    }

    return $paginator;
}

function dataGetUri(Array $get)
{
    $str = '';

    foreach ($get as $key => $value) {
        if ($key != 'page')
            $str = '&'.$key.'='.$value;
    }

    return $str;
}

require_once __DIR__.'/Auth.php';
require_once __DIR__.'/User.php';
require_once __DIR__.'/Category.php';
require_once __DIR__.'/Product.php';
require_once __DIR__.'/Service.php';
require_once __DIR__.'/News.php';
require_once __DIR__.'/JobApplication.php';
require_once __DIR__.'/Mail/Send.php';
