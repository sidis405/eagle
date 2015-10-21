<?php

namespace Acme\Repositories;

use Acme\Models\Staff;

class StaffRepo
{

    public function save(Staff $staff)
    {
        $staff->save();

        return $staff;
    }

    public function getAll()
    {
        return Staff::all();
    } 

    public function getById($id)
    {
        return Staff::where('id', $id);
    } 

    public function getBySlug($slug)
    {
        return Staff::where('slug', $slug);
    } 
}
