<?php

/**
 * Class Routes
 *
 * Main Route class that defines the routes and their request methods
 *
 * Todo: change the ROUTES array with classes, so it will be allowed to have the same route with different request method
 * Todo: implement middlewares and routes per request method
 */
class Routes
{
    const ROUTES = [
        '/' => [
            'controllerClass' => 'IndexController',
            'method' => 'index',
        ],
        '/save' => [
            'controllerClass' => 'saveController',
            'method' => 'save',
        ],
    ];
}