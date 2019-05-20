<?php

class Configuration
{
    private static $configParameter;

    public static function get($configName, $defaultValue = null)
    {
        // Cherche s'il existe des paramètre concernant le nom de la configuration renseigné
        if(isset(self::getConfigParam()[$configName]))
        {
            $configParam = self::getConfigParam()[$configName];
        }
        // Sinon récupère un paramètre "null" ou le paramètre renseigné
        else
        {
            $configParam = $defaultValue;
        }

        // Renvoi le(s) paramètre(s) correspondant au non de la config renseigné
        return $configParam;
    }

    private static function getConfigParam()
    {
        if(self::$configParameter == null)
        {
            $filePath = "Config/prod.ini";

            if(!file_exists($filePath))
            {
                $filePath = "Config/dev.ini";
            }
            if(!file_exists($filePath))
            {
                throw new Exception("Fichier de configuration .ini introuvable");
            }
            else
            {
                // Stocke sous forme d'array associatif la valeur correspondant au non de la configuration demandé
                self::$configParameter = parse_ini_file($filePath);
            }
        }

        return self::$configParameter;
    }
}
