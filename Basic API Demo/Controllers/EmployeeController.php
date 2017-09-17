<?php

namespace Demo;

use Demo\Services\EmployeeServiceInterface;

class EmployeeController extends \Amvisie\Core\BaseApiController
{
    private $service;
    
    public function __construct(EmployeeServiceInterface $service)
    {
        $this->service = $service;
    }
            
    /**
     * GET /api/employee
     * @return array
     */
    public function getAll() : array
    {
        return $this->service->getAll();
    }

    /**
     * 
     * @param int $id
     * @return Repositories\EmployeeRepository
     */ 
    public function get(int $id)
    {
        return $this->service->getOne($id) ?? $this->notFound();
    }
    
    public function post(EmployeeModel $employee)
    {
        if ($employee->isValid()) {
            return $this->service->save($employee);
        } else {
            return $this->forbidden($employee->getErrors());
        }
    }
    
    public function put(int $id, EmployeeModel $employee)
    {
        if ($employee->isValid()) {
            $this->service->update($id, $employee);
            return $this->ok();
        } else {
            return $this->forbidden($employee->getErrors());
        }
    }
    
    public function delete(array $id)
    {
        var_dump($id);
    }
}
