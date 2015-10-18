<?php

namespace App\Eagle;

use Symfony\Component\Yaml\Yaml;
use Exception;
use App\Eagle\EagleModels;
use App\Eagle\EagleRepos;

class Eagle {

    protected $application_filename = 'application.yml';
    public $config;
    public $namespace;

    public function __construct()
    {
        $this->config = $this->getConfig();
        $this->namespace = $this->config->application;
        $this->models = new EagleModels;
        $this->repos = new EagleRepos;
    }

    public function getConfig()
    {
        $application_file = base_path().'/' . $this->application_filename;

        $config = @file_get_contents($application_file) ;

        if( ! $config){

            throw new Exception('cannot find ' .base_path() .'/application.yml');

        }

        $data = json_decode(json_encode(Yaml::parse($config)));

        return $data;
    }

    public function build()
    {
        $out = '';

        if($this->config->processed) return 'Application has already been built. Set processed:true to re-build again.';


       $out.= '<br>' . $this->handleAppDir();
       $out.= '<br>' . $this->installDependencies();
       $out.= '<br>' . $this->handleEntities();

       return $out;
    }

    public function handleAppDir()
    {
        $out = '';
        $out.= '<br>' . 'Namespace of app has been set to: ' . $this->namespace;
        $out.= '<br>' . 'Will create dir app/' . $this->config->application;
        $out.= '<br>' . 'Add to composer.json "'.$this->namespace.'\\\":"'.$this->config->psr4.'"';

        return $out;
    }

    public function installDependencies()
    {
        $deps = [];
        foreach($this->config->dependencies as $dep){
            if($dep->enabled){
                $deps[] = $dep->repo;
            }
        }

        return 'will run "composer require ' .join(' ', $deps).'"';

    }

    function handleEntities()
    {
        $out = '';

        foreach($this->config->entities as $entity)
        {
            if( $entity->processed )
            {
                $out.= '<br>' . 'Entity "'.$entity->name.'" has alredy been processed. Skipping.';
            }else{
                $out.= '<br>' . $this->processEntity($entity);
            }
        }

        return $out;
    }

    public function processEntity($entity)
    {
        $out = 'Processing entity "' . $entity->name . '"';
        $out.= '<br>' . $this->models->makeModel($entity, $this->namespace);
        $out.= '<br>' . $this->repos->makeRepo($entity, $this->namespace);
        return $out;
    }


    // public function makeScaffold($entity)
    // {
        
    // }



    // public function makeCommand($entity)
    // {
    //     //make basecommand
    //     //make Bus Service provider
    // }

    // public function makeBaseCommand($entity)
    // {
        
    // }

    // public function makeEvents($entity)
    // {
        
    // }

    // public function makeController($entity)
    // {
        
    // }

    // public function makeRoutes($entity)
    // {
        
    // }

    // public function makeAdmin($entity)
    // {
        
    // }

}

