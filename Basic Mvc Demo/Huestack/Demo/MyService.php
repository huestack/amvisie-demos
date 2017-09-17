<?php

namespace Huestack\Demo;

class MyService implements IService
{
    public function getLangs(): array
    {
        return array('en_US' => 'English', 'fr_FR' => 'French');
    }
}
