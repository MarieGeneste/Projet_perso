<?php

require_once('Framework/Controller.php');
require_once('Framework/Model.php');
require_once('Models/Articles.php');

class HomeController extends Controller
{
    private $lesson;
    private $practice;

    public function __construct()
    {
        $this->lesson = new Lesson();
        $this->practice = new Practice();
    }

    public function index()
    {
        $lessons = $this->lesson->getLesson();
        $this->generateView(array('lessons' => $lesson, 'practices' => $practice));
    }
}
