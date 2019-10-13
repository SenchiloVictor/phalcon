<?php

// use Phalcon\Mvc\Micro;
// use Phalcon\Events\Event;
// use Phalcon\Mvc\Micro\Collection as MicroCollection;
// use Phalcon\Mvc\Router\Group as RouterGroup;
// use Phalcon\Events\Manager as EventsManager;

// $eventsManager = new EventsManager();

// $eventsManager->attach(
//     'micro:beforeNotFound',
//     function (Event $event, $app) {
//         die('404 micro');
//     }
// );



// $router->mount($apiGroup);

// $appHome = new Micro();

// $appHome->before(
//     new App\Http\Api\Middlewares\AuthMiddleware()
// );
// $appHome->setEventsManager($eventsManager);

// $appHome->setService('router', $router, true);
// $appHome->get('/two', null);
// $appHome->handle();
