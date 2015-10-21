<?php

namespace App\Eagle;
use App\Eagle\EagleUtils;

class EagleCommands extends EagleNest {

    protected $stub;
    protected $entity;
    protected $path;
    protected $namespace;
    protected $types = ['Create', 'Update'];

    public function makeCommand($entity, $namespace)
    {

        if($entity->commands)
        {

            foreach($this->types as $type){

                $this->stub = $this->getStub('Commands/'.$type.'Command');
                $this->entity = $entity;
                $this->namespace = $namespace;
                $this->path = base_path().'/app/'.$this->namespace.'/Commands/'.$this->entity->name.'/'.$type.$this->entity->name.'Command.php';
                $this->setNamespace();
                $this->setModelName();
                $this->setModelInstance();
                $this->writeFile();
                $this->bag('Created ' .$type. ' Command for : ' .$entity->name);
                

            }
        }

    }

}