<?php

namespace Huestack\Demo\Models;

use Amvisie\Core\Annotations;
use Huestack\Demo\Resources\LoginResource;

/**
 * Description of LoginModel
 *
 * @author ritesh
 */
class LoginModel extends \Amvisie\Core\BaseModel
{
    public $email, $password;
    
    public function __construct()
    {
        $this->getMeta()->addAttributes('email', array(
            new Annotations\ModelDisplay(LoginResource::get('emailCaption')),
            new Annotations\RequiredRule(LoginResource::get('emailRequired'))
        ));
        
        $this->getMeta()->addAttributes('password', array(
            new Annotations\ModelDisplay(LoginResource::get('passwordCaption')),
            new Annotations\RequiredRule(LoginResource::get('passwordRequired'))
        ));
    }
}
