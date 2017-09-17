<?php

namespace Huestack\Demo\Controllers;

use Amvisie\Core\Web\ViewResponse;
use Amvisie\Core\Cookie;
use Amvisie\Core\MethodContext;
use Huestack\Demo\Models\ContactModel;

class HomeController extends \Amvisie\Core\BaseController 
{
    /**
     *
     * @var \Huestack\Demo\IService 
     */
    private $service;
    
    public function __construct(\Huestack\Demo\IService $service)
    {
        $this->service = $service;
    }
    
    protected function beforeMethodCall(MethodContext $context)
    {
        $langs = $this->service->getLangs();
        $cookie =  $this->request()->cookie('app');
        $this->viewObject->langList = $langs;
        if ($cookie){
            $this->viewPocket['selectedLang'] = $langs[$cookie->get('lang') ?? 'en_US'];
        } else {
            $this->viewPocket['selectedLang'] = $langs[ 'en_US'];
        }
    }

    public function getIndex()
    {
        return $this->view();
    }
    
    public function getAbout() 
    {
        return $this->view();
    }
    
    public function getContact() {
        return $this->view();
    }

    public function getLang(string $loc){
        $cookie = $this->request()->cookie('app');
        if (!$cookie) {
            $cookie = new Cookie('app');
        }

        $cookie->add('lang', $loc);
        
        $this->response()->setCookie($cookie);
        return $this->redirectToMethod('index');
    }

    public function postContact(ContactModel $model)
    {
        if ($model->isValid()){
             return $this->view('Contacted', $model);
        } else {
             return $this->view('Contact', $model);
        }
    }
}
