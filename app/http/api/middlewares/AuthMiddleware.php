<?php

namespace App\Http\Api\Middlewares;

use Phalcon\Mvc\Micro;
use Phalcon\Mvc\Micro\MiddlewareInterface;

class AuthMiddleware implements MiddlewareInterface
{
    public function beforeHandleRoute(Event $event, Micro $application)
    {
        echo ' beforeHandleRoute(Event $event, Micro $application) ';
    }

    public function call(Micro $app)
    {
        echo '  call(Micro $app) ';
    }
}