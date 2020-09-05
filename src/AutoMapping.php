<?php


namespace App;
use AutoMapperPlus\AutoMapper;
use AutoMapperPlus\Configuration\AutoMapperConfig;
use AutoMapperPlus\Exception\UnregisteredMappingException;

class AutoMapping
{
    public function config($source,$target)
    {
        $config = new AutoMapperConfig();
        $config->registerMapping($source, $target);
        $mapper = new AutoMapper($config);
        return $mapper;
    }
    public function map($source,$target,$object)
    {
        $mapper=$this->config($source,$target);
        try {
            $response = $mapper->map($object, $target);
        } catch (UnregisteredMappingException $e) {
        }
        return $response;
    }
    public function mapToObject($source,$target,$sourceObject,$targetObject)
    {
        $mapper=$this->config($source,$target);
        try {
            $response = $mapper->mapToObject($sourceObject, $targetObject);
        } catch (UnregisteredMappingException $e) {
        }
        return $response;
    }
}