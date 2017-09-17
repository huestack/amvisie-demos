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
        $items = array();;
        foreach ($this->repository->fetchAll() as $item) {
            $items[] = new \Demo\EmployeeViewModel(
                        $item['id'],
                        $item['name'],
                        $item['email']
                    );
        }
        
        return $items;
    }

    public function getOne(int $id): ?\Demo\EmployeeViewModel
    {
        $item = $this->repository->fetchOne($id);
        
        if ($item == null) {
           return null; 
        }
        
        return new \Demo\EmployeeViewModel(
                        $item['id'],
                        $item['name'],
                        $item['email']
                    );
    }

    public function save(\Demo\EmployeeModel $employee): \Demo\EmployeeViewModel
    {
        $id = $this->repository->save($employee);
        return new \Demo\EmployeeViewModel($id, $employee->name, $employee->email);
    }

    public function update(int $id, \Demo\EmployeeModel $employee)
    {
        
    }
}
