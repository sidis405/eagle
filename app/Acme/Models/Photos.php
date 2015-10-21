<?php

namespace Acme\Models;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;


class Photos extends Model implements HasMedia
{
    use PresentableTrait, HasMediaTrait;

    protected $presenter = 'Acme\Presenters\PhotosPresenter';

    public static function make($path, $album_id)
    {
        $item = new static(compact('path', 'album_id'));

        return $item;
    }

    public static function edit($item_id, $path, $album_id)
    {
        $item = static::find($item_id);

        $item->path = $path;
        $item->album_id = $album_id;

        return $item;
    }

    public function albums(){

        return $this->belongsTo('Acme\Models\Albums', 'album_id');

    }



}
