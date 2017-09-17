<?php

namespace Demo\Repositories;

interface EmployeeRepositoryInterface
{
    function fetchOne(int $id) : ?array;
    
    function fetchAll() : array;
    
    function add(\Demo\EmployeeModel $employee) : int;
    
    function update(int $id, \Demo\EmployeeModel $model) : bool;
    
    function delete(int $id) : bool;
}
