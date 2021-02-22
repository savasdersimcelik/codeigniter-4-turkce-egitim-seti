<?php

$routes->group('project', ['namespace' => '\Modules\Project\Controllers'], function($routes)
{
    $routes->get('index', 'ProjectController::index');
});