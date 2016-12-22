<?php

namespace CatalogOfPhpPatterns\DependencyInjection;

/**
 * Class RegisteredObject
 * @package CatalogOfPhpPatterns\DependencyInjection
 */
class RegisteredObject
{
    /**
     * @var \ReflectionClass
     */
    protected $typeToResolve;

    /**
     * @var \ReflectionClass
     */
    protected $concrete;

    /**
     * @var string
     */
    protected $lifeCycle;

    /**
     * @var null
     */
    protected $instance = null;


    /**
     * RegisteredObject constructor
     *
     * @param \ReflectionClass $typeToResolve
     * @param \ReflectionClass $concrete
     * @param string $lifeCycle
     */
    public function __construct(\ReflectionClass $typeToResolve, \ReflectionClass $concrete,
                                $lifeCycle = LifeCycle::SINGLETON)
    {
        $this->typeToResolve = $typeToResolve;
        $this->concrete = $concrete;
        $this->lifeCycle = $lifeCycle;
    }

    /**
     * @param $params
     * @return null|object
     */
    public function createInstance($params)
    {
        $this->instance = $this->concrete->newInstanceArgs($params);
        return $this->instance;
    }

    /**
     * @return null
     */
    public function getInstance()
    {
        return $this->instance;
    }

    /**
     * @return string
     */
    public function getLifeCycle()
    {
        return $this->lifeCycle;
    }

    /**
     * @return string
     */
    public function getTypeName()
    {
        return $this->typeToResolve->getName();
    }

    /**
     * @return string
     */
    public function getConcreteTypeName()
    {
        return $this->concrete->getName();
    }
}