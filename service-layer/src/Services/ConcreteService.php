<?php

/**
 * Created by PhpStorm.
 * User: ksv
 * Date: 22.12.16
 * Time: 16:04
 */

namespace CatalogOfPhpPatterns\ServiceLayer\Services;

use CatalogOfPhpPatterns\ServiceLayer\Interfaces\IConcreteRepository;

/**
 * Class ConcreteService
 * @package CatalogOfPhpPatterns\ServiceLayer\Services
 */
class ConcreteService extends GenericService
{
    /**
     * @var IConcreteRepository|null
     */
    protected $repository = null;

    /**
     * ConcreteService constructor
     * @param IConcreteRepository $repository
     */
    public function __construct(IConcreteRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return string
     */
    public function helloWorld()
    {
        return sprintf("%s, %s!", $this->repository->foo(), $this->repository->bar());
    }
}