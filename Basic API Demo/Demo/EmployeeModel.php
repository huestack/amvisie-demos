<?php

namespace Demo;

use Amvisie\Core\Annotations\RequiredRule;
use Amvisie\Core\Annotations;

class EmployeeModel extends \Amvisie\Core\BaseModel
{
    public $name, $email;
    
    public function __construct()
    {
        $this->getMeta()->addAttributes('name', array(
            new RequiredRule('name is required')
        ));
        
        $this->getMeta()->addAttributes('email', array(
            new RequiredRule('email is required')
        ));
        
        $this->getMeta()->addPropertyTypeInfo('name', new Annotations\PropertyTypeInfo());
        $this->getMeta()->addPropertyTypeInfo('email', new Annotations\PropertyTypeInfo());
    }
}
