<?php

namespace Acme\Repositories;

use Acme\Models\Activities;

class ActivitiesRepo
{

    public function save(Activities $activity)
    {
        $activity->save();

        return $activity;
    }

    public function getAll()
    {
        return Activities::all();
    } 

    public function getById($id)
    {
        return Activities::where('id', $id);
    } 

    public function getBySlug($slug)
    {
        return Activities::where('slug', $slug);
    } 
}
