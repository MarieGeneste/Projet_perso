<?php

require_once('Framework/Controller.php');
require_once('Models/Articles.php');
require_once('Models/Comments.php');

class LessonController extends Controller
{
    private $lesson;

    public function __construct()
    {
        $this->lesson = new Lesson();
    }

    public function index()
    {
        $artId = $this->request->getReqParamValue('id');

        $lesson = $this->lesson->getArticle($lessonId);
        $comments = $this->comments->getComments($artId);
        $this->generateView(array('article' => $lesson, 'practice' => $practice));
    }

    // public function commentsSettings()
    // {
    //     $artId = $this->request->getReqParamValue("id");
    //     $author = $this->request->getReqParamValue("comAuthor");
    //     $content = $this->request->getReqParamValue("newComContent");

    //     $this->comments->setNewComments($author, $content, $artId);

    //     header('Location: index.php?controller=Article&id=1');
    //     // $this->executeAction('index');
    // }
}
