<?php

namespace Demo\Repositories;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    private $list;
    private $fileName;
    
    public function __construct(string $fileName)
    {
        $this->fileName = $fileName;
        
        if (file_exists($fileName)) {
            $content = file_get_contents($fileName);
            $this->list = json_decode($content, true);
        } else {
            $this->list = [];
        }
    }  
    
    public function fetchAll(): array {
        return $this->list;
    }

    public function fetchOne(int $id): ?array
    {
        return $this->getItemById($id);
    }

    public function add(\Demo\EmployeeModel $employee): int
    {
        $newEmployee = array();
        
        $lastEmployeeId = 
                count($this->list) == 0 ?  1000 : 
                    $this->list[count($this->list) - 1]['id'];
        
        $newEmployee['id'] = $lastEmployeeId + 1;
        $newEmployee['name'] = $employee->name;
        $newEmployee['email'] = $employee->email;
        
        $this->list[] = $newEmployee;
        
        $this->save();
        
        return $newEmployee['id'];
    }
    
    public function update(int $id, \Demo\EmployeeModel $employee) : bool
    {
        $item = $this->getItemById($id);
        
        if ($item === null) {
            return false;
        }
        
        $item['name'] = $employee->name;
        $item['email'] = $employee->email;
        
        $index = $this->getItemIndex($id);
        $this->list[$index] = $item;
        
        $this->save();
        
        return true;
    }
    
    private function save() : void
    {
        file_put_contents($this->fileName, json_encode($this->list));
    }

    private function getItemById(int $id) : ?array
    {
        foreach ($this->list as &$item)  {
            if ($item["id"] == $id) {
                return $item;
            }
        }
        
        return null;
    }
    
    private function getItemIndex(int $id) : int
    {
        for ($index = 0; $index < count($this->list); $index++) {
            if ($this->list[$index]["id"] == $id) {
                return $index;
            }
        }
        
        return -1;
    }

    public function delete(int $id): bool {
        $index = $this->getItemIndex($id);
        if ($index === -1) {
            return false;
        }
        
        unset($this->list[$index]);
        $this->save();
        
        return true;
    }
}
