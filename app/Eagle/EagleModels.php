<?php

namespace App\Eagle;

use Exception;

class EagleModels extends EagleNest{

    protected $namespace;
    protected $entity;
    protected $stub;
    protected $path;

    public function makeModel($entity, $namespace)
    {
        $this->namespace = $namespace;
        $this->entity = $entity;
        $this->stub = $this->getStub('Model');
        $this->path = base_path().'/app/'.$this->namespace.'/Models/'.$this->entity->name.'.php';

        $this->setModelName();

        $this->setNameSpace();

        $this->setImports();
        $this->setFactory();

        // Account for __FACTORY__ thus commands
        // MAKE PRESENTER FILE
        logger($this->stub);
        
        // $this->writeFile();

        return $this->stub;

    }


    public function setFactory()
    {
        if($this->entity->commands){
            $factory = $this->getStub('Factory');
        }else{
            $factory = '';
        }

        $this->stub = str_replace('__FACTORY__', $factory,  $this->stub);
    }

    

    public function setImports()
    {
        $imports = [];
        $traits = [];
        $implements = '';
        $presenter = '';

        list($imports, $traits, $presenter) = $this->setPresenterImports($imports, $traits, $presenter);
        list($imports, $traits, $implements) = $this->setMediaImports($imports, $traits, $implements);

        $this->stub = str_replace('__IMPORTS__', join('',$imports),  $this->stub);
        $this->stub = str_replace('__IMPLEMENTS__', $implements,  $this->stub);
        $this->stub = str_replace('__PRESENTER__', $presenter,  $this->stub);

        $this->stub = str_replace('__TRAITS__', join(', ', $traits), $this->stub);

    }

    public function setModelName()
    {
        $this->stub = str_replace('__MODELNAME__', $this->entity->name,  $this->stub);
    }

    public function setPresenterImports($imports, $traits, $presenter)
    {
        if($this->entity->presentable){
            $imports[] = 'use Laracasts\Presenter\PresentableTrait;'. PHP_EOL;;

            $traits[] = 'PresentableTrait';

            

            $presenter = "protected \$presenter = '" .$this->namespace. "\Presenters\\" . $this->entity->name . "Presenter';";
        }else{
            $presenter = '';
        }


        return [$imports, $traits, $presenter];
    }

    public function setMediaImports($imports, $traits, $implements)
    {
        if($this->entity->media){
            $imports[] = 'use Spatie\MediaLibrary\HasMedia\HasMediaTrait;'. PHP_EOL;;
            $imports[] = 'use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;'. PHP_EOL;;

            $traits[] = 'HasMediaTrait';

            $implements = 'implements HasMedia';
        }else{
            $implements = '';
        }


        return [$imports, $traits, $implements];
    }

    public function setNamespace()
    {
        $namespace = $this->namespace . '\Models';

        $this->stub = str_replace('__NAMESPACE__', $namespace, $this->stub);

    }

    



}

