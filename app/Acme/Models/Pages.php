<?php

namespace Acme\Models;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;


class Pages extends Model implements HasMedia
{
    use PresentableTrait, HasMediaTrait;

    protected $presenter = 'Acme\Presenters\PagesPresenter';

    public static function make($myeField)
    {
        $item = new static(compact('myField'));

        return $item;
    }

    public static function edit($item_id, $myField)
    {
        $item = static::find($item_id);

        $item->myField = $myField;

        return $item;
    }
}
