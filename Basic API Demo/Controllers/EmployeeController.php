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
     * @return EmployeeViewModel
     */
    public function get(int $id)
    {
        return $this->service->getOne($id) ?? $this->notFound();
    }
    
    /**
     * POST /api/employee
     * @return EmployeeViewModel On success.
     */
    public function post(EmployeeModel $employee)
    {
        if ($employee->isValid()) {
            return $this->service->save($employee);
        } else {
            return $this->forbidden($employee->getErrors());
        }
    }
    
    /**
     * PUT /api/employee/@id
     * @return \Amvisie\Core\ResponseInterface.
     */
    public function put(int $id, EmployeeModel $employee)
    {
        if ($employee->isValid()) {
            return $this->service->update($id, $employee)
                    ? $this->ok() : $this->notFound();
        } else {
            return $this->forbidden($employee->getErrors());
        }
    }
    
    public function delete(int $id)
    {
        return $this->service->deleteOne($id)
                    ? $this->ok() : $this->notFound();
    }
}
