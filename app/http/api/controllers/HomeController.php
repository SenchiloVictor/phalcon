<?php

namespace App\Http\Api\Controllers;

class HomeController extends \Phalcon\Mvc\Controller
{
    public function one()
    {
        echo ' controller one action ';
        exit;

    }

    public function two()
    {
        echo ' controller two action ';
        exit;
    }
}