<?php
// set up
require __DIR__ . '/vendor/autoload.php';
$app = new Slim\App(['settings' => ['displayErrorDetails' => true]]);
// templates
$container = $app->getContainer();
$container['view'] = function($container)
{
    $templates = __DIR__ . '/templates/';
    $cache     = __DIR__ . '/tmp/views' ;

    $view = new Slim\Views\Twig($templates, compact('cache'));
    return $view;
};
// routing
$app->get('/', function ($request, $response) {
    return $this->view->render($response, 'home.twig');

});
// host
$app->run();

?>