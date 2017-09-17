<?php
namespace Huestack\Demo\Models;

use Amvisie\Core\Annotations;
use Huestack\Demo\Resources\ContactResource;

class ContactModel extends \Amvisie\Core\BaseModel
{
    public $name;
    public $email;
    public $message;

    public function __construct()
    {
        $this->getMeta()->addAttributes('name', array(
            new Annotations\ModelDisplay(ContactResource::get('nameCaption')),
            new Annotations\RequiredRule(ContactResource::get('nameRequired')),
        ));

        $this->getMeta()->addAttributes('email', array(
            new Annotations\ModelDisplay(ContactResource::get('emailCaption')),
            new Annotations\RequiredRule(ContactResource::get('emailRequired')),
        ));

        $this->getMeta()->addAttributes('message', array(
            new Annotations\ModelDisplay(ContactResource::get('messageCaption')),
            new Annotations\RequiredRule(ContactResource::get('messageRequired')),
        ));
    }
}
