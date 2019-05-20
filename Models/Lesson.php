<?php

require_once('Framework/Model.php');

class Articles extends Model
{
    public function getLessons()
    {
        // Récupère TOUS LES COURS de la table
        // $lessonsReq = "SELECT BIL_ID as artId, BIL_DATE as artDate, BIL_TITRE as artTitle, BIL_CONTENU as artContent FROM T_BILLET ORDER BY artDate DESC";

        // $lessons = $this->dbRequest($lessonsReq);
        // return $lessons;
    }

    public function getLesson($lessonId)
    {
        // Récupère le COURS correspondant à l'ID renseigné en paramètre
        // $lessonReq =  'SELECT BIL_ID as artId, BIL_DATE as artDate, BIL_TITRE as artTitle, BIL_CONTENU as artContent
        //                 FROM T_BILLET
        //                 WHERE BIL_ID = ?';

        // $lesson = $this->dbRequest($lessonReq, array($lessonId));
        // if($lesson->rowCount() == 1)
        // {
        //     return $lesson->fetch();
        // }
        // else
        // {
        //     throw new Exception("Le cours demandé n'a pas été trouvé");
        // }
    }
}
