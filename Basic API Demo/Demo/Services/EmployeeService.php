<?php

namespace Demo\Services;

use Demo\Repositories\EmployeeRepositoryInterface;

class EmployeeService implements EmployeeServiceInterface
{
    /**
     *
     * @var EmployeeRepositoryInterface
     */
    private $repository;
    
    public function __construct(EmployeeRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function deleteOne(int $id): void
    {
        
    }

    public function getAll(): array
    {
        return $this->repository->fetchAll();
    }

    public function getOne(int $id): \Demo\Employee
    {
        return $this->repository->fetchOne($id);
    }

    public function save(\Demo\Employee $employee): int
    {
        
    }

}
