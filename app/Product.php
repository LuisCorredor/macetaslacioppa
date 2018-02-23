<?php 

function storeProduct(Array $data, Array $file)
{
    if (!isset($data['category_id']))
        notify('Alerta!!!', 'warning', 'Verifique seleciono la categoria para el producto');
    else {
        $dat = [
            'category_id' => $data['category_id'],
            'name' => $data['name'],
            'slug' => str_slug($data['name']),
            'description' => isset($data['description']) ? $data['description'] : '',
        ];
    
        if (App\Models\Product::FindBySlug(str_slug($data['name'])))
            notify('Alerta!!!', 'warning', 'El slug de es el mismo de una ya registrada');
        else 
            if ($new = App\Models\Product::create($dat)) {
                if ($data['measures'] == ' ') {
                    d($data['measures']);
                    updateOrCreateMeasures($new->id, explode(';', $data['measures']));
                }
                    
                $new->images()->create(['image_path' => fileProduct($new->id, $file)]);
                notify('Éxitos', 'success', 'La producto se a registrado correctamente');
            }
    }
    
}

function updateOrCreateMeasures($id, Array $data)
{
    foreach ($data as $value) {
        App\Models\ProductMeasures::updateOrCreate([
            'product_id' => $id,
            'measure' => $value,
        ]);
    }
}

function fileProduct($id, Array $file)
{
    $src = '';
    preg_match("/\/(.*)/", $file['type'], $type);
    $src = 'storage/products/pro_img_'.$id;
    if ($type[1] == 'jpeg') {
        $src .= '.jpg';
    } else {
        $src .= '.'.$type[1];
    }

    uploadImages($file, __DIR__.'/../public/'.$src);
    return $src;
}

function updateProduct(Array $data, Array $file)
{
    $dat = [
        'category_id' => $data['category_id'],
        'name' => $data['name'],
        'slug' => str_slug($data['name']),
        'description' => isset($data['description']) ? $data['description'] : '',
    ];

    $row = App\Models\Product::find($data['id']);

    if ($row->update($dat)) {
        if (!empty($data['measures']))
            updateOrCreateMeasures($row->id, explode(';', $data['measures']));
        if ($file['name'])
            $row->images()->updateOrCreate(['image_path' => fileProduct($row->id, $file)]);
        notify('Éxitos', 'success', 'El producto se a actualizo correctamente');
    }
}

function destroyProduct($id)
{
    if (!$product = App\Models\Product::find($id))
        notify('Error', 'error', 'No se encuentra la categoria');

    if ($product){
        App\Models\ProductMeasures::byProductId($id)->delete();
        foreach (App\Models\ProductImages::byProductId($id)->get() as $images) {
            unlink(__DIR__.'/../public/'.$images->image_path);
            $images->delete();
        }
        
    }

    if ($product->delete()){
        notify('Éxitos', 'success', 'La categoria se elimino correctamente');
    }else
        notify('Error', 'error', 'La categoria no se pudo elimino');
}