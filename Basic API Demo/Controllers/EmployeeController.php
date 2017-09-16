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
     * GET /api/employee/@id
     * @return array
     */
    public function get(int $id) : ?\Demo\Employee
    {
        return $this->service->getOne($id);
    }
    
    public function post(Employee $employee)
    {
        if ($employee->isValid()) {
            return $this->ok();
        } else {
            return $this->forbidden($employee->getErrors());
        }
    }
    
    public function put(int $id, Employee $employee)
    {
        if ($employee->isValid()) {
            return $this->ok();
        } else {
            return $this->forbidden($employee->getErrors());
        }
    }
}
