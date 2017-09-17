<?php

namespace Demo\Repositories;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    private $list = array();
    private $fileName;
    
    public function __construct(string $fileName)
    {
        $this->fileName = $fileName;
        $content = file_get_contents($fileName);
        $this->list = json_decode($content, true);
    }  
    
    public function fetchAll(): array {
        return $this->list;
    }

    public function fetchOne(int $id): ?array
    {
        $items = array_filter(
            $this->list, 
            function (array $item) use ($id)
            {
                return $item['id'] == $id;
            }
        );
        
        return count($items) == 0 ? null : array_pop($items);
    }

    public function save(\Demo\EmployeeModel $employee): int
    {
        $newEmployee = array();
        
        $lastEmployee = $this->list[count($this->list) - 1];
        
        $newEmployee['id'] = $lastEmployee['id'] + 1;
        $newEmployee['name'] = $employee->name;
        $newEmployee['email'] = $employee->email;
        
        $this->list[] = $employee;
        
        file_put_contents($this->fileName, json_encode($this->list));
        
        return $employee['id'];
    }
}
