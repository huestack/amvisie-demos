<?php

namespace Demo\Repositories;

interface EmployeeRepositoryInterface
{
    function fetchOne(int $id) : ?array;
    
    function fetchAll() : array;
    
    function save(\Demo\EmployeeModel $employee) : int;
}
