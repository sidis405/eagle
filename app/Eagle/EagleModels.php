<?php

namespace App\Eagle;

use App\Eagle\EaglePresenters;
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

        $this->setModelName($this->entity->name,  $this->stub);

        $this->setNameSpace();

        $this->setImports();
        $this->setFactory();

        
        $this->writeFile();

        return $this->stub;

    }


    public function setFactory()
    {
        if($this->entity->commands){
            $factory = $this->getStub('Factory');
        }else{
            $factory = '';
        }

        $this->bag('Created factory for: ' .$this->entity->name);

        $this->stub = $this->replaceInStub('__FACTORY__', $factory,  $this->stub);
    }

    

    public function setImports()
    {
        $imports = [];
        $traits = [];
        $implements = '';
        $presenter = '';

        list($imports, $traits, $presenter) = $this->setPresenterImports($imports, $traits, $presenter);
        list($imports, $traits, $implements) = $this->setMediaImports($imports, $traits, $implements);

        $this->stub = $this->replaceInStub('__IMPORTS__', join('',$imports),  $this->stub);
        $this->stub = $this->replaceInStub('__IMPLEMENTS__', $implements,  $this->stub);
        $this->stub = $this->replaceInStub('__PRESENTER__', $presenter,  $this->stub);

        $this->stub = $this->replaceInStub('__TRAITS__', join(', ', $traits), $this->stub);


    }


    public function setPresenterImports($imports, $traits, $presenter)
    {
        if($this->entity->presentable){
            $imports[] = 'use Laracasts\Presenter\PresentableTrait;'. PHP_EOL;;

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

        $this->bag('Handled model media for: ' .$this->entity->name);

        return [$imports, $traits, $implements];
    }

   

}

