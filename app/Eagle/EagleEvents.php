<?php

namespace App\Eagle;
use App\Eagle\EagleUtils;

class EagleEvents extends EagleNest {

    protected $stub;
    protected $entity;
    protected $path;
    protected $namespace;
    protected $types = ['Create', 'Update'];

    public function makeEvent($entity, $namespace)
    {

        if($entity->events)
        {

            foreach($this->types as $type){

                $this->type = $type;

                $this->stub = $this->getStub('Event');
                $this->entity = $entity;
                $this->namespace = $namespace;
                $this->path = base_path().'/app/'.$this->namespace.'/Events/'.$this->entity->name.'/'.EagleUtils::singularize($this->entity->name).'Was'.$type.'d.php';
                $this->setNamespace();
                $this->setModelName();
                $this->setModelInstance();
                $this->setEventType();
                $this->writeFile(false);
                $this->bag('Created ' .$type. ' Event for : ' .$entity->name);
                

            }
        }

    }

}