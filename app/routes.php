<?php

$routes = [
    '/' => [
        'controller' => 'HomeController',
        'action' => 'index'
    ],

    'register' => [
        'controller' => 'UserController',
        'action' => 'register'
    ],

    'login' => [
        'controller' => 'UserController',
        'action' => 'login'
    ],

    'logout' => [
        'controller' => 'UserController',
        'action' => 'logout'
    ],

    'edit-avatar' => [
        'controller' => 'UserController',
        'action' => 'editAvatar'
    ],
];