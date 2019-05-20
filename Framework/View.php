<?php

// AJOUTER DANS TEMPLATE : <base href="<?= $racineWeb !>" />

class View
{
    private $fileView;
    private $pageTitle;

    public function __construct($action, $controller = "")
    {
        $fileView = "Views/";
        if($controller !="")
        {
            $fileView = $fileView . $controller . "/";
        }
        $this->fileView = $fileView . $action .".php";
    }

    public function generatePage($data)
    {
        // Récupère le CONTENU DE LA VUE correspondant à la page et les DONNEES (get, post, session, erros, etc...) renseignée en paramètre
        $content = $this->collectContent($this->fileView, $data);

        $racineWeb = Configuration::get("racineWeb", "/");

        // Récupère le TEMPLATE ainsi que le TITRE DE LA PAGE et SON CONTENU (VUE + DONNEES) dans le template
        $view = $this->collectContent('Views/template.php', array('pageTitle' => $this->pageTitle, 'content' => $content, 'racineWeb' => $racineWeb));

        // Renvoi la page générée
        echo $view;
    }

    private function collectContent($file, $data)
    {
        if(file_exists($file))
        {
            // Extrait les DONNEES
            extract($data);
            // Extrait le CONTENU du fichier renseigné en paramètre
            ob_start();
            require $file;
            // Retourne le CONTENU DU FICHIER
            return ob_get_clean();
        }
    }

    private function cleanValue($value)
    {
        return htmlspecialchars($value, ENT_QUOTES, 'utf-8', false);
    }
}
