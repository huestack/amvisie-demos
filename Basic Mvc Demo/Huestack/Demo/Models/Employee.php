<?php

namespace Huestack\Demo\Models;

class Employee 
{
    public $id, $name, $email;
    
    public function __construct(int $id, string $name, string $email)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }
}
