<?php

namespace Demo\Repositories;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    private $list = array();
    
    public function __construct(string $fileName)
    {
        //$file = fopen($fileName, 'r');
        $content = file_get_contents($fileName);
        $array = json_decode($content, true);
        
        foreach ($array as $item) {
            $employee = new \Demo\Employee();
            $employee->id = $item['id'];
            $employee->name = $item['name'];
            $employee->email = $item['email'];
            
            $this->list[] = $employee;
        }
    }  
    
    public function fetchAll(): array {
        return $this->list;
    }

    public function fetchOne(int $id): \Demo\Employee
    {
        $items = array_filter(
            $this->list, 
            function (\Demo\Employee $item) use ($id)
            {
                return $item->id == $id;
            }
        );

        return count($items) == 0 ? null : $items[0];
    }

    public function save(Employee $employee): int
    {
        
    }
}
