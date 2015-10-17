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

    public function getStub($name)
    {
        $filename = base_path().'/app/Eagle/Stubs/' . $name . '.stub';

        $stub = @file_get_contents($filename) ;

        if( ! $stub){

            throw new Exception('cannot find ' . $name . ' stub');

        }

        return $stub;

    }

    
}

