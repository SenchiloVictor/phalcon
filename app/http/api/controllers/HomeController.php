<?php

namespace App\Http\Api\Controllers;

class HomeController extends \Phalcon\Mvc\Controller
{
    public function oneAction()
    {
        echo ' controller one action ';
        exit;

    }

    public function twoAction()
    {
        echo ' controller two action ';
        exit;
    }
}