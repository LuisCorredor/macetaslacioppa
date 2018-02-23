<?php

function storeCategory(Array $data, Array $file)
{
    $dat = [
        'name' => $data['name'],
        'slug' => str_slug($data['name']),
        'description' => isset($data['description']) ? $data['description'] : '',
        'image_path' => '',
    ];

    if (App\Models\Category::FindBySlug(str_slug($data['name'])))
        notify('Alerta!!!', 'warning', 'El slug de es el mismo de una ya registrada');
    else 
        if ($new = App\Models\Category::create($dat)) {
            $new->update(['image_path' => fileCategory($new->id, $file)]);
            notify('Éxitos', 'success', 'La categoria se a registrado correctamente');
        }
}

function fileCategory($id, Array $file)
{
    $src = '';
    preg_match("/\/(.*)/", $file['type'], $type);
    $src = 'storage/categories/cat_img_'.$id;
    if ($type[1] == 'jpeg') {
        $src .= '.jpg';
    } else
        $src .= '.'.$type[1];
    uploadImages($file, __DIR__.'/../public/'.$src);
    return $src;
}

function updateCategory(Array $data, Array $file)
{
    $dat = [
        'name' => $data['name'],
        'slug' => str_slug($data['name']),
        'description' => isset($data['description']) ? $data['description'] : '',
    ];

    $row = App\Models\Category::find($data['category_id']);

    if ($row->update($dat)) {
        if ($file['name'])
            $row ->update(['image_path' => fileCategory($row->id, $file)]);

        notify('Éxitos', 'success', 'La categoria se a registrado correctamente');
    }
}

function destroyCategory($id)
{
    if (!$category = App\Models\Category::find($id))
        notify('Error', 'error', 'No se encuentra la categoria');

    if ($category) 
        unlink(__DIR__.'/../public/'.$category->image_path);
    
    if ($category->delete()){
        notify('Éxitos', 'success', 'La categoria se elimino correctamente');
    }else
        notify('Error', 'error', 'La categoria no se pudo elimino');
}