<?php

namespace Huestack\Demo\Controllers;

class EmployeeController extends \Amvisie\Core\BaseApiController
{
    private $service;
    
    public function __construct(\Huestack\Demo\EmployeeService $service)
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
    public function get(int $id) : ?\Huestack\Demo\Models\Employee
    {
        return $this->service->get($id);
    }
}
