<?php

date_default_timezone_set('UTC');

use App\Http\Api\Middlewares\AuthMiddleware;
use Phalcon\Events\Manager as EventsManager;
use Phalcon\Events\Event;
use Phalcon\Mvc\Micro;
use Phalcon\DI\FactoryDefault;
use Phalcon\Loader;
use Phalcon\Mvc\Micro\Collection as MicroCollection;
use Phalcon\Cache\{
    Frontend\Data as FrontData,
    Backend\Libmemcached as Memcache
};
use Phalcon\Mvc\{
    Application,
    Dispatcher,
    Router,
    Router\Group as RouterGroup,
    View,
    View\Engine\Volt
};

(new Loader())->registerNamespaces([
    'App\Http\Api\Controllers' => APP_PATH . '/http/api/controllers',
    'App\Http\Api\Middlewares' => APP_PATH . '/http/api/middlewares',
])->register();

$di = new FactoryDefault();

$di->set(
    'voltService',
    function ($view, $di) : Volt {
        $volt = new Volt(
            $view,
            $di
        );

        $volt->setOptions([
            'compiledPath' => BASE_PATH . '/storage/cache/views/',
            'compiledExtension' => '.compiled',
            'compiledSeparator' => '_',
            'compileAlways' => true,
            'stat' => true
        ]);

        return $volt;
    }
);

$di->set('view', function () : View {
    $view = new View;

    $view->setViewsDir(BASE_PATH . '/views/');
    $view->registerEngines([
        '.volt'  => 'voltService',
        '.phtml' => 'Phalcon\Mvc\View\Engine\Php'
    ]);

    return $view;
});


$homeCollection = new MicroCollection([
    'namespace' => 'App\\Http\\Api\\Controllers',
]);

$homeCollection->setHandler('App\\Http\\Api\\Controllers\\HomeController', true);

$homeCollection->get('/one', 'one');
$homeCollection->get('/two', 'two');

$application = new Micro($di);
$eventsManager = new EventsManager();

$eventsManager->attach(
    'micro:beforeNotFound',
    function (Event $event, $app) {
        die ('404 micro:beforeNotFound');
    }
);


$application->before(new AuthMiddleware());
$eventsManager->attach('micro', new AuthMiddleware());

$application->setEventsManager($eventsManager);

$application->mount($homeCollection);

$application->handle();
