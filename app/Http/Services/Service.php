<?php

namespace App\Http\Services;

use App\Models\Post;

class Service
{
    public function store($data)
    {
        if ( isset($data['tags'])) {
            $tags = $data['tags'];
            unset($data['tags']);

            $post = Post::create($data);
            $post->tags()->attach($tags); //tags() - query(Запрос в базу данных). Атач для привязки, он принимает массив
        }
    }

    public function update($post, $data)
    {
        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags); //sync удаляет старые зависимости и ставит новые
    }

}
