<?php

require_once 'Request.php';
require_once 'View.php';

abstract class Controller
{
    // Stocke les paramètres contenus dans la requête et leurs valeurs : $_GET[controller] etc... (controller=...&actionMethod=... )
    protected $request;
    protected $actionMethod;

    public function setRequest(Request $request)
    {
        $this->request = $request;
    }

    public function executeAction($actionMethod)
    {
        if(method_exists($this, $actionMethod))
        {
            $this->actionMethod = $actionMethod;
            $this->{$this->actionMethod}();
        }
        else
        {
            $controllerClass = get_class($this);
            throw new Exception("La méthode ". $actionMethod ." n'existe pas dans le controlleur ". $controllerClass);
        }
    }

    public abstract function index();

    protected function generateView($pageData = array())
    {
        $controllerClass = get_class($this);
        $controller = str_replace("Controller", "", $controllerClass);
        $view = new View($this->actionMethod, $controller);
        $view->generatePage($pageData);

    }
}
