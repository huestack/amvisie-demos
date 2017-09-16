<?php

namespace Huestack\Demo\Admin\Controllers;

class AccountController extends \Amvisie\Core\BaseController
{
    public function getIndex()
    {
        return $this->view();
    }
    
    public function postIndex(\Huestack\Demo\Models\LoginModel $model)
    {
        if ($model->isValid()) {
            return $this->view('LoginDone');
        } else {
            return $this->view('Index', $model);
        }
    }
}
