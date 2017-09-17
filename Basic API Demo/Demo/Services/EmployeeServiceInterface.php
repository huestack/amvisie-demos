<?php

namespace Demo\Services;

interface EmployeeServiceInterface
{
    function getOne(int $id) : ?\Demo\EmployeeViewModel;
    
    function getAll() : array;
    
    function deleteOne(int $id) : void;
    
    function save(\Demo\EmployeeModel $employee) : \Demo\EmployeeViewModel;
    
    function update(int $id, \Demo\EmployeeModel $employee) : bool;
}
