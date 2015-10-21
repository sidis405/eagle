<?php

namespace Acme\Models;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;


class Staff extends Model 
{
    use PresentableTrait;

    protected $presenter = 'Acme\Presenters\StaffPresenter';

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
