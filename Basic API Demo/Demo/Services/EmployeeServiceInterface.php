<?php

namespace Demo\Services;

interface EmployeeServiceInterface
{
    function getOne(int $id) : \Demo\Employee;
    
    function getAll() : array;
    
    function deleteOne(int $id) : void;
    
    function save(\Demo\Employee $employee) : int;
}
