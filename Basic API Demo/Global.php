<?php
declare(strict_types=1);

namespace Huestack\Demo;

/**
 * 
 * @author Ritesh Gite, Huestack
 */
class MyApplication extends \Amvisie\Core\Application
{
    private $injector;
    
    public function __construct()
    {
        $this->injector = new \Auryn\Injector();
    }
    
    public function init()
    {
        ini_set('display_errors', '1');
        error_reporting(E_ALL);

        ini_set("log_errors", "1");
        ini_set("error_log", dirname(APP_PATH) . "/logs/php_info.log");

        $this->addApiRoutes();

        $this->registerControllerFactory();
        $this->inject();
        
        parent::init();
    }

    public function beginRequest()
    {
        $cookie = $this->request()->cookie("app");
        if ($cookie){
            $lang = $cookie->get("lang") ?? '';

            \Amvisie\Core\Culture::setCulture($lang == 'en_US' ? '' : $lang);
        }
    }
    
    /**
     * Add routes.
     */
    private function addRoutes()
    {
        \Amvisie\Core\Route::addRoute(
                'Admin', 
                'admin/@controller/@method/@id',
                array('@controller' => 'account', '@method' => 'index', '@id' => null),
                array(),
                'Admin'
        );
        
        \Amvisie\Core\Route::addRoute('ROOT', '@controller/@method/@id',
            array('@controller' => 'home', '@method' => 'index', '@id' => null)
        );
    }
    
    /**
     * Add api routes.
     */
    private function addApiRoutes()
    {
        \Amvisie\Core\Route::addRoute('API_Employee', 'api/@controller/@id',
            array('@controller' => 'employee', '@id' => null)
        );
    }
    
    private function registerControllerFactory()
    {
        \Amvisie\Core\ControllerBuilder::current()->setControllerFactory(new \Demo\MyControllerFactory($this->injector));
    }
    
    private function inject() : void
    {
        $this->injector->define(
                \Demo\Repositories\EmployeeRepository::class, 
                [
                    ':fileName' => APP_PATH . 'store/employee.json'
                ]);
        
        $this->injector->alias(
                \Demo\Repositories\EmployeeRepositoryInterface::class,
                \Demo\Repositories\EmployeeRepository::class);
        
        $this->injector->alias(
                \Demo\Services\EmployeeServiceInterface::class,
                \Demo\Services\EmployeeService::class);
    }
}
