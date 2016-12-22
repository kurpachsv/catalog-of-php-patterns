<?php

namespace CatalogOfPhpPatterns\DependencyInjection;

use CatalogOfPhpPatterns\DependencyInjection\Exceptions\TypeNotRegisteredException;

/**
 * Class Container
 * @package CatalogOfPhpPatterns\DependencyInjection
 */
class Container implements IContainer
{
    /**
     * @var array
     */
    protected $registeredObjects = [];

    /**
     * @param $typeToResolve
     * @param $concrete
     * @param string $lifeCycle
     * @return mixed|void
     */
    public function register($typeToResolve, $concrete, $lifeCycle = LifeCycle::SINGLETON)
    {
        $this->registeredObjects[] = new RegisteredObject(new \ReflectionClass($typeToResolve),
            new \ReflectionClass($concrete), $lifeCycle);
    }

    /**
     * @param $typeToResolve
     * @return null
     */
    public function resolve($typeToResolve)
    {
        return $this->resolveObject(new \ReflectionClass($typeToResolve));
    }

    /**
     * @param \ReflectionClass $typeInfo
     * @return null
     * @throws TypeNotRegisteredException
     */
    protected function resolveObject(\ReflectionClass $typeInfo)
    {
        foreach ($this->registeredObjects as $registeredObject)
        {
            if ($registeredObject->getTypeName() == $typeInfo->getName()) {
                return $this->getInstance($registeredObject);
            }
        }

        throw new TypeNotRegisteredException("The type {$typeInfo->getName()} has not been registered");
    }

    /**
     * @param RegisteredObject $registeredObject
     * @return null
     */
    protected function getInstance(RegisteredObject $registeredObject)
    {
        if (is_null($registeredObject->getInstance()) ||
            $registeredObject->getLifeCycle() == LifeCycle::TRANSIENT) {

            $params = $this->resolveConstructorParameters($registeredObject);
            $registeredObject->createInstance(iterator_to_array($params));
        }

        return $registeredObject->getInstance();
    }

    /**
     * @param RegisteredObject $registeredObject
     * @return \Generator
     */
    protected function resolveConstructorParameters(RegisteredObject $registeredObject)
    {
        $reflection = new \ReflectionClass($registeredObject->getConcreteTypeName());
        $constructorInfo = $reflection->getConstructor();

        if (!is_null($constructorInfo)) {

            $params = $constructorInfo->getParameters();
            foreach ($params as $param) {
                yield $this->resolve($param->getClass()->getName());
            }
        }
    }
}