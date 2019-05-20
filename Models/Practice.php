<?php

require_once('Framework/Model.php');

class Practice extends Model
{
    public function getPractice($artId)
    {
        // Récupère TOUS LES COMMENTAIRES correspondant à l'ID de L'ARTICLE renseigné en paramètre
        // $practiceSelect =
        //     'SELECT COM_ID as comId, COM_DATE as comDate, COM_AUTEUR as comAuthor, COM_CONTENU as comContent
        //     FROM T_COMMENTAIRE as practice
        //     WHERE BIL_ID = ?';

        // $practice = $this->dbRequest($practiceSelect, array($artId));

        // return $practice;
    }

    public function setNewPractice($author, $content, $articleId)
    {
        // Récupère TOUS LES COMMENTAIRES correspondant à l'ID de L'ARTICLE renseigné en paramètre
        // $practiceInsert =
        //     'INSERT INTO T_COMMENTAIRE (COM_DATE, COM_AUTEUR, COM_CONTENU, BIL_ID)
        //      VALUES (?, ?, ?, ?)';
        // $comDate = date("Y-m-d H:i:s");

        // $this->dbRequest($practiceInsert, array($comDate, $author, $content, $articleId));
    }
}
