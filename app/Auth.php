<?php

/**
 * Sistema de Auth de usuarios
 */
function autentication(Array $data)
{
    $user = App\Models\User::where('email', $data['email'])
                ->where('password', md5($data['password']))
                ->first();
    if (!$user)
        notify('Accesso denegado!!!', 'error', 'Credenciales de acceso invalidas');
    else {
        $_SESSION['auth'] = $user->id;
        header('Location: principal.php');
    }
}

/**
 * Variable datos del Auth:user()
 */
function auth()
{
    return isset($_SESSION['auth']) ? App\Models\User::find($_SESSION['auth']) : null;
}

/**
 * Permite obtener el avatar o uno por defecto
 */
function avatar()
{
    return !empty(auth()->avatar) ? '../'.auth()->avatar : '../storage/avatars/default.jpg';
}