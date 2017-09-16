<?php

namespace Demo;

/**
 * Registers a factory that resolves the controller.
 *
 * @author Ritesh Gite.
 */
class MyControllerFactory implements \Amvisie\Core\ControllerFactoryInterface
{
    /**
     * A DI Container.
     * @var \Auryn\Injector 
     */
    private $injector;
    
    public function __construct(\Auryn\Injector $injector)
    {
        $this->injector = $injector;
    }

    public function createController(string $controllerName): \Amvisie\Core\ControllerInterface
    {
        return $this->injector->make($controllerName);
    }
}
