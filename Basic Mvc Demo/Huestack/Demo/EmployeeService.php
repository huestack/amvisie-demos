<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Huestack\Demo;

/**
 * Description of EmployeeService
 *
 * @author ritesh
 */
class EmployeeService 
{
    private $list;
    
    public function __construct()
    {
        $this->list = array(
            new Models\Employee(1001, 'Jon Snow', 'jonsnow@castleblack.org'),
            new Models\Employee(1002, 'Sam Tarly', 'sam@castleblack.org'),
            new Models\Employee(1003, 'Jorah Mormont', 'jorah.friend@dragons.inc'),
        );
    }
    
    public function getAll(): array
    {
        return $this->list;
    }
    
    public function get(int $id) : ?Models\Employee
    {
        $items = array_filter(
            $this->list, 
            function (Models\Employee $item) use ($id){
                return $item->id == $id;
            }
        );

        return count($items) == 0 ? null : $items[0];
    }
}
