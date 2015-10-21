<?php

namespace Acme\Repositories;

use Acme\Models\Pages;

class PagesRepo
{

    public function save(Pages $page)
    {
        $page->save();

        return $page;
    }

    public function getAll()
    {
        return Pages::all();
    } 

    public function getById($id)
    {
        return Pages::where('id', $id);
    } 

    public function getBySlug($slug)
    {
        return Pages::where('slug', $slug);
    } 
}
