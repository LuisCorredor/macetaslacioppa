<?php

function storeService(Array $data, Array $file)
{
    $dat = [
        'name' => $data['name'],
        'slug' => !empty($data['name']) ? str_slug($data['name']) : null,
        'image_path' => '',
    ];

    if (App\Models\Service::FindBySlug(str_slug($data['name'])))
        notify('Alerta!!!', 'warning', 'El slug de es el mismo de una ya registrada');
    else 
        if ($new = App\Models\Service::create($dat)) {
            $new->update(['image_path' => fileService($new->id, $file)]);
            notify('Éxitos', 'success', 'El servicio se a registrado correctamente');
        }
}

function updateService(Array $data, Array $file)
{
    $dat = [
        'title' => $data['name'],
        'slug' => !empty($data['name']) ? str_slug($data['name']) : null,
    ];

    $row = App\Models\Service::find($data['id']);

    if ($row->update($dat)) {
        if ($file['name'])
            $row ->update(['image_path' => fileService($row->id, $file)]);

        notify('Éxitos', 'success', 'El servicio se a registrado correctamente');
    }
}

function fileService($id, Array $file)
{
    $src = '';
    preg_match("/\/(.*)/", $file['type'], $type);
    $src = 'storage/services/ser_img_'.$id;
    if ($type[1] == 'jpeg') {
        $src .= '.jpg';
    } else
        $src .= '.'.$type[1];
    uploadImages($file, __DIR__.'/../public/'.$src);
    return $src;
}


function destroyService($id)
{
    
    if (!$service = App\Models\Service::find($id))
        notify('Error', 'error', 'No se encuentra la servicio');

    if ($service) 
        unlink(__DIR__.'/../public/'.$service->image_path);
    
    if ($service->delete()){
        notify('Éxitos', 'success', 'El servicio se elimino correctamente');
    }else
        notify('Error', 'error', 'El servicio no se pudo elimino');

}