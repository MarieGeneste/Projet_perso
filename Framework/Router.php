<?php

require_once 'Request.php';
require_once 'View.php';

class Router
{
    public function routerRequest()
    {
        try
        {
            // Définit et rassemble dans un même tableau le variable globale de requête utilisées
            $request = new Request(array_merge($_GET, $_POST));

            // Trouve et instancie le controller renseigné dans la requête($_GET)
            $controller = $this->findNewController($request);
            // Trouve la méthode correspondant à l'action renseignée dans la requête
            $action = $this->findAction($request);

            // Exécute la méthode correspondant à l'action renseignée, dans le controller renseigné
            $controller->executeAction($action);
        }
        catch (Exception $e)
        {
            $this->generateError($e);
        }
    }

    private function findNewController(Request $request)
    {
        $controller = "Home";

        if($request->reqParamExist('controller'))
        {
            // Récupère le nom du controller s'il est renseigné dans la requête
            $controller = $request->getReqParamValue('controller');
            $controller = ucfirst(strtolower($controller));
        }

        $controllerClass = $controller .'Controller';
        $controllerFile = 'Controllers/'. $controllerClass .'.php';

        if(file_exists($controllerFile))
        {
            require_once($controllerFile);
            $newController = new $controllerClass;
            $newController->setRequest($request);
            return $newController;
        }
        else
        {
            throw new Exception("Fichier ". $controllerFile ." introuvable");
        }
    }

    private function findAction(Request $request)
    {
        $action = "index";

        if($request->reqParamExist('action'))
        {
            $action = $request->getReqParamValue('action');
        }
        return $action;
    }

    private function generateError(Exception $error)
    {
        $view = new View('Error');
        $view->generatePage(array('errorMsg' => $error->getMessage()));
    }
}
