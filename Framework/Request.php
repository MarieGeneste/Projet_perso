<?php

class Request
{
    private $method;

    public function __construct($methods)
    {
        // Renseigne les types de méthodes ($_GET, $_POST)
        $this->method = $methods;
    }

    public function reqParamExist($fieldName)
    {
        // Si le paramètre du champs renseigné et est != null, renvoi TRUE
        return(!empty($this->method[$fieldName]));
    }

    public function getReqParamValue($fieldName)
    {
        if($this->reqParamExist($fieldName))
        {
            return $this->method[$fieldName];
        }
        else
        {
            throw new Exception("Le champs". $fieldName ."n'existe pas ou n'est pas renseigné dans la requêtes");
        }
    }
}
