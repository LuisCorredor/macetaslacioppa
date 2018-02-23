<?php

/**
 * Cambio de contraseña para usuarios
 */
function userUpdatePassword(Array $data)
{
    $dat = [ 'password' => md5($data['password']) ];

    if (isset($data['user_id'])) {
        userUpdate($data['user_id'], $dat);
    }
    userUpdate($_SESSION['auth'], $dat);
}

/**
 * Cambio de datos para usuarios
 */
function editUserData(Array $data)
{
    $dat = [ 
        'name' => $data['name'],
        'email' => $data['email'],
    ];

    if (isset($data['user_id'])) {
        userUpdate($data['user_id'], $dat);
    } else
        userUpdate($_SESSION['auth'], $dat);
}


/**
 * Update de data de usuarios con notify
 */
function userUpdate($id, $data)
{
    if ($user = App\Models\User::find($id)) {
        if ($user->update($data))
            notify('Éxitos', 'success', 'Los datos del usuario fueron actualizados');
        else
            notify('Error', 'error', 'No se actualizaron los datos');
    }else
        notify('Alerta!!!', 'warning', 'No se encontro el usuario');
}

/**
 * Carga la imagen de perfil del usuario.
 */
function uploadProfileImg(Array $data)
{
    preg_match("/\/(.*)/", $data['type'], $type);
    if (!$data['name']) 
        notify('Error', 'error', 'El archivo no se pudo subir');
    elseif ($data['type'] != 'image/jpeg' && $data['type'] != 'image/png' && $data['type'] != 'image/gif') 
        notify('Atención', 'warning', 'El archivo no es una imagen');
    else {
        $src = 'storage/avatars/ava_img_'.auth()->id;

        if ($type[1] == 'jpeg') {
            $src .= '.jpg';
        } else
            $src .= '.'.$type[1];

        auth()->update([
            'avatar' => $src
        ]);

        uploadFiles($data, __DIR__.'/../public/'.$src);
    }

}


function deleteUser($id)
{
    if (!$user = App\Models\User::find($id))
        notify('Error', 'error', 'No se encuentra el usuario');

    if ($user->delete()){
        notify('Éxitos', 'success', 'El usuario se elimino correctamente');
    }else
        notify('Error', 'error', 'El usuario no se pudo elimino');
}

/**
 * Crear Usuario
 */
function userCreate(Array $data)
{
    $dat = [ 
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => md5('1234')
    ];

    if (App\Models\User::findByEmail($data['email']))
        notify('Alerta!!!', 'warning', 'El correo ya se encuentra registrado');
    else 
        if (App\Models\User::create($dat))
            notify('Éxitos', 'success', 'El usuario se a registrado correctamente');

}