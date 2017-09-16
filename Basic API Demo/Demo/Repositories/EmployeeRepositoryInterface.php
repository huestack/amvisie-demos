<?php

namespace Demo\Repositories;

interface EmployeeRepositoryInterface
{
    function fetchOne(int $id) : \Demo\Employee;
    
    function fetchAll() : array;
    
    function save(Employee $employee) : int;
}
