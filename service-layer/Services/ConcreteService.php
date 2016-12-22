<?php

/**
 * Created by PhpStorm.
 * User: ksv
 * Date: 22.12.16
 * Time: 16:04
 */

namespace CatalogOfPhpPatterns\Services;

use CatalogOfPhpPatterns\Interfaces\IConcreteRepository;

/**
 * Class ConcreteService
 * @package CatalogOfPhpPatterns\Services
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
}