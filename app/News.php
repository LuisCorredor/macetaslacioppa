<?php

function storeNews(Array $data, Array $file)
{
    $dat = [
        'title' => $data['title'],
        'slug' => str_slug($data['title']),
        'description' => isset($data['description']) ? $data['description'] : '',
        'public_date' => date('Y-m-d H:i:s'),
        'image_path' => '',
    ];

    if (App\Models\News::FindBySlug(str_slug($data['title'])))
        notify('Alerta!!!', 'warning', 'El slug de es el mismo de una ya registrada');
    else 
        if ($new = App\Models\News::create($dat)) {
            foreach (explode(';', $data['tags']) as $tag) {
                if (!empty($tag)){
                    $tag = updateOrCreateTag($tag);
                    $new->tags()->attach($tag->id);
                }
            }
            $new->update(['image_path' => fileNews($new->id, $file)]);
            notify('Éxitos', 'success', 'La novedade se a registrado correctamente');
        }

}

function updateNews(Array $data, Array $file)
{
    $dat = [
        'title' => $data['title'],
        'slug' => str_slug($data['title']),
        'description' => isset($data['description']) ? $data['description'] : '',
    ];

    $row = App\Models\News::find($data['news_id']);

    if ($row->update($dat)) {
        $row->tags()->detach();
        foreach (explode(';', $data['tags']) as $tag) {
            if (!empty($tag)){
                $tag = updateOrCreateTag($tag);

                if (!$row->tags()->find($tag->id))
                    $row->tags()->attach($tag->id);
            }
        }
        if ($file['name'])
            $row->update(['image_path' => fileNews($row->id, $file)]);

        notify('Éxitos', 'success', 'La novedade se a actualizo correctamente');
    }

}

function destroyNews($id)
{
    if (!$news = App\Models\News::find($id))
        notify('Error', 'error', 'No se encuentra la novedade');

    if ($news) {
        $news->tags()->detach();
        unlink(__DIR__.'/../public/'.$news->image_path);
    }

    if ($news->delete()){
        notify('Éxitos', 'success', 'La novedade se elimino correctamente');
    }else
        notify('Error', 'error', 'La novedade no se pudo elimino');
}

function fileNews($id, Array $file)
{
    $src = '';
    preg_match("/\/(.*)/", $file['type'], $type);
    $src = 'storage/news/news_img_'.$id;
    if ($type[1] == 'jpeg') {
        $src .= '.jpg';
    } else
        $src .= '.'.$type[1];
    uploadImages($file, __DIR__.'/../public/'.$src);
    return $src;
}

function updateOrCreateTag(String $value)
{
    $dat = [
        'name' => ucfirst($value),
        'slug' => str_slug($value),
    ];

    return App\Models\Tag::updateOrCreate($dat);
}