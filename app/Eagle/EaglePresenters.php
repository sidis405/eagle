<?php

namespace App\Eagle;

class EaglePresenters extends EagleNest {

    protected $stub;
    protected $entity;
    protected $namespace;
    protected $path;

    public function makePresenter($entity, $namespace)
    {
        $this->stub = $this->getStub('Presenter');
        $this->entity = $entity;
        $this->namespace = $namespace;
        $this->path = base_path().'/app/'.$this->namespace.'/Presenters/'.$this->entity->name.'Presenter.php';
        $this->setNamespace();
        $this->setModelName();
        $this->writeFile();

    }

}