<?php

namespace CatalogOfPhpPatterns\DependencyInjection;

/**
 * Interface IContainer
 * @package CatalogOfPhpPatterns\DependencyInjection
 */
interface IContainer
{
    /**
     * @param $typeToResolve
     * @param $concrete
     * @param string $lifeCycle
     * @return mixed
     */
    function register($typeToResolve, $concrete, $lifeCycle = LifeCycle::SINGLETON);

    /**
     * @param $typeToResolve
     * @return mixed
     */
    function resolve($typeToResolve);
}