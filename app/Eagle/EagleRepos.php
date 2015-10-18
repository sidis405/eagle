<?php

namespace App\Eagle;
use App\Eagle\EagleUtils;

class EagleRepos extends EagleNest {

    protected $stub;
    protected $entity;
    protected $path;
    protected $namespace;

    public function makeRepo($entity, $namespace)
    {

        $this->stub = $this->getStub('Repository');
        $this->entity = $entity;

        if($this->entity->repository)
        {
            $this->namespace = $namespace;
            $this->path = base_path().'/app/'.$this->namespace.'/Repositories/'.$this->entity->name.'Repo.php';
            $this->setNamespace();
            $this->setRepoSave();
            $this->setModelName();
            $this->writeFile();
        }

        

    }

    public function setRepoSave()
    {
        if($this->entity->commands){
            $factory = $this->getStub('RepoSave');
        }else{
            $factory = '';
        }

        $factory = $this->replaceInStub('__MODELINSTANCE__', strtolower(EagleUtils::singularize($this->entity->name)), $factory);

        $this->stub = $this->replaceInStub('__REPOSAVE__', $factory,  $this->stub);
    }

}