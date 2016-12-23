<?php

/**
 * Created by PhpStorm.
 * User: ksv
 * Date: 22.12.16
 * Time: 16:05
 */

namespace CatalogOfPhpPatterns\ServiceLayer\Interfaces;

/**
 * Interface IConcreteRepository
 * @package CatalogOfPhpPatterns\ServiceLayer\Interfaces
 */
interface IConcreteRepository
{
    /**
     * @return string
     */
    function foo();

    /**
     * @return string
     */
    function bar();
}