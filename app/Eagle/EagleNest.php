<?php

namespace App\Eagle;

class EagleNest {

    public function writeFile()
    {
        if(!file_exists(dirname($this->path))){
            mkdir(dirname($this->path), 0777, true);
        }
        file_put_contents($this->path, $this->stub);
    }

    public function setNamespace()
    {
        $this->stub = $this->replaceInStub('__NAMESPACE__', $this->namespace, $this->stub);
    }

    public function setModelName()
    {
        $this->stub = $this->replaceInStub('__MODELNAME__', $this->entity->name,  $this->stub);
    }

    public function getStub($name)
    {
        $filename = base_path().'/app/Eagle/Stubs/' . $name . '.stub';

        $stub = @file_get_contents($filename) ;

        if( ! $stub){

            throw new Exception('cannot find ' . $name . ' stub');

        }

        return $stub;

    }

    public function replaceInStub($search, $replace, $stub)
    {
        return str_replace($search, $replace,  $stub);
    }

    
}

