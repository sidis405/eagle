<?php

namespace Acme\Models;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;


class Albums extends Model implements HasMedia
{
    use PresentableTrait, HasMediaTrait;

    protected $presenter = 'Acme\Presenters\AlbumsPresenter';

    public static function make($name, $slug, $title, $description, $featured_photo_id)
    {
        $item = new static(compact('name', 'slug', 'title', 'description', 'featured_photo_id'));

        return $item;
    }

    public static function edit($item_id, $name, $slug, $title, $description, $featured_photo_id)
    {
        $item = static::find($item_id);

        $item->name = $name;
        $item->slug = $slug;
        $item->title = $title;
        $item->description = $description;
        $item->featured_photo_id = $featured_photo_id;

        return $item;
    }

    public function photos(){

        return $this->hasMany('Acme\Models\Photos', 'album_id');

    }



}
