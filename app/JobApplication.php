<?php

use Carbon\Carbon;

function storeJob(Array $data, Array $file)
{
    $dat = [
        'first_name' => $data['nombre'],
        'last_name' => $data['apellido'], 
        'email' => $data['email'], 
        'birth_date' => Carbon::parse($data['nacimiento'])->toDateString(),
        'nationality' => $data['nacionalidad'],
        'province' => $data['provincia'],
        'location' => $data['localidad'],
        'phone' => $data['telefono'],
        'web' => $data['web'],
        'contact' => $data['comment'],
        'interest' => $data['area'],
    ];

    if ($row = App\Models\JobApplication::updateOrCreate($dat)) {
        $row->update(['file_path' => fileCV($row->id, $file)]);
        notify('Éxitos', 'success', 'Su solicutud esta siendo procesada');
    }
}

function fileCV($id, Array $file)
{
    $src = '';
    preg_match("/\/(.*)/", $file['type'], $type);
    $src = 'storage/cvs/cv_'.$id;
    $src .= '.'.$type[1];
    uploadFiles($file, __DIR__.'/../public/'.$src);
    return $src;
}

function destroyJob($id)
{
    if (!$job = App\Models\JobApplication::find($id))
        notify('Error', 'error', 'No se encuentra el CV');

    if ($job) 
        unlink(__DIR__.'/../public/'.$job->file_path);
    
    if ($job->delete()){
        notify('Éxitos', 'success', 'El CV sea elimino correctamente');
    }else
        notify('Error', 'error', 'El CV no se pudo elimino');
}