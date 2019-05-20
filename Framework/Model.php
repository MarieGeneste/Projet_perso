<?php
require_once('Framework/Configuration.php');

abstract class Model
{
    private static $_db;

    private static function getDb()
    {
        /**
        * @return PDO [Object] : db connection
        **/
        if(self::$_db == null)
        {
            $_dsn = Configuration::get("dsn");
            $_login = Configuration::get("login");
            $_pwd =  Configuration::get("pwd");
            $options =
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ];

            try
            {
                self::$_db = new PDO ($_dsn, $_login, $_pwd, $options);
            }
            catch (\Exception $e)
            {
                throw new Exception("Problème de connection à la base de données");
            }
        }
        return self::$_db;
        // Connection à la base de données
    }

    /**
    * @param string $sql : Requête SQL
    * @param array $params : Paramètre de requête préparée
    * @return PDOStatement [array]: Résultat de la requète
    **/
    protected function dbRequest($sql, $params = null)
    {
        // Exécute les requètes sans paramètres
        if($params == null)
        {
            $request = self::getDb()->query($sql);
        }
        // Exécute les requètes préparées
        else
        {
            $request = self::getDb()->prepare($sql);
            $request->execute($params);
        }

        // Retourne les données demandées
        return $request;
    }
}
