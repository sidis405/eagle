<?php

namespace App\Eagle;
use App\Eagle\EagleUtils;


class EagleCommandHandlers extends EagleNest {

    protected $stub;
    protected $entity;
    protected $path;
    protected $namespace;
    protected $types = ['Create', 'Update'];
    protected $imports;
    protected $construct;
    protected $persister;
    protected $eventable;

    public function makeHandler($entity, $namespace)
    {

        if($entity->commands)
        {

            foreach($this->types as $type){

                $this->imports = [];
                $this->construct = '';
                $this->construct = '';
                $this->eventable = '';

                $this->stub = $this->getStub('Commands/'.$type.'CommandHandler');
                $this->entity = $entity;
                $this->namespace = $namespace;
                $this->path = base_path().'/app/'.$this->namespace.'/Handlers/Commands/'.$this->entity->name.'/'.$type.$this->entity->name.'CommandHandler.php';
                $this->setNamespace();
                $this->setModelName();
                $this->setModelInstance();
                $this->setImports();
                $this->writeFile();
                $this->bag('Created ' .$type. ' Handler for : ' .$entity->name);


            }
        }

    }


    public function setImports()
    {
        if($this->entity->repository){
            $imports[] = 'use __NAMESPACE__\Presenter\PresentableTrait;'. PHP_EOL;;

            $traits[] = 'PresentableTrait';

            $eagle_presenter = new EaglePresenters;
            $eagle_presenter->makePresenter($this->entity, $this->namespace);

            $presenter = "protected \$presenter = '" .$this->namespace. "\Presenters\\" . $this->entity->name . "Presenter';";
        }else{
            $presenter = '';
        }

        $this->bag('Handled model presenter for: ' .$this->entity->name);

        return [$imports, $traits, $presenter];

    }

}