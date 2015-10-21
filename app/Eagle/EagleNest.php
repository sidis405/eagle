<?php

namespace App\Eagle;
use Exception;

class EagleNest {

    public $write;

    public function writeFile($write = true)
    {
        if($write){
            if(!file_exists(dirname($this->path))){
                mkdir(dirname($this->path), 0777, true);
            }
            file_put_contents($this->path, $this->stub);

            $this->bag('WROTE FILE : ' .$this->path);
        }

    }

    public function setNamespace()
    {
        $this->bag('Setting namespace to : ' .$this->namespace);
        $this->stub = $this->replaceInStub('__NAMESPACE__', $this->namespace, $this->stub);
    }

    public function setModelName()
    {
        $this->bag('Setting modelname to : ' .$this->entity->name);
        $this->stub = $this->replaceInStub('__MODELNAME__', $this->entity->name,  $this->stub);
    }

    public function setEventType()
    {
        $this->bag('Setting event type to : ' .$this->type);
        $this->stub = $this->replaceInStub('__TYPE__', $this->type,  $this->stub);
    }

    public function setModelInstance($lowercase = false)
    {
        $this->bag('Setting model instance to: ' .EagleUtils::singularize($this->entity->name));
        if($lowercase){
            $this->stub = $this->replaceInStub('__MODELINSTANCE__', strtolower(EagleUtils::singularize($this->entity->name)),  $this->stub);    
        }else{
            $this->stub = $this->replaceInStub('__MODELINSTANCE__', EagleUtils::singularize($this->entity->name),  $this->stub);
        }

        $this->stub = $this->replaceInStub('__MODELINSTANCE_L__', strtolower(EagleUtils::singularize($this->entity->name)),  $this->stub);    
        
    }

    public function getStub($name)
    {
        $this->bag('Fetching Stub : ' .$name);
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

    public function bag($message)
    {
        $current_stream = \Session::get('current_stream');

        $current_stream[] = $message;

        \Session::put('current_stream', $current_stream);
    }

    public function makeFieldList()
    {
        $fields = [];

        foreach($this->entity->fields as $field)
        {
            $pieces = explode(':', $field->name);
            $fields[] = $pieces[0];
        }

        return '$'.join(', $', $fields);
    }

    public function makeFieldListCompact()
    {
        $fields = [];

        foreach($this->entity->fields as $field)
        {
            $pieces = explode(':', $field->name);
            $fields[] = $pieces[0];
        }

        return '\''.join("', '", $fields).'\'';
    }

    public function makeFieldListSingles($item_name = 'item')
    {
        $fields = [];

        foreach($this->entity->fields as $field)
        {
            $pieces = explode(':', $field->name);
            $fields[] = '$'.$item_name .'->'. $pieces[0] . ' = $' . $pieces[0] .';';
        }

        return join($fields, PHP_EOL.'        ');
    }

    public function makeFieldListSinglesFromCommand($item_name = 'item')
    {
        $fields = [];

        foreach($this->entity->fields as $field)
        {
            $pieces = explode(':', $field->name);
            $fields[] = '$'.$item_name .'->'. $pieces[0] ;
        }

        return join($fields, ',' . PHP_EOL.'        ');
    }

    public function makeFieldListParams($scope = 'public')
    {
        $fields = [];

        foreach($this->entity->fields as $field)
        {
            $pieces = explode(':', $field->name);
            $fields[] = $scope . ' $'. $pieces[0] . ';';
        }

        return join($fields, PHP_EOL.'      ');
    }

    
}

