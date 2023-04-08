<?php

$routes = [

    // Home Routes
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

    // Admin Routes

    // Category Routes
    'category' => [
        'controller' => 'CategoryController',
        'action' => 'index'
    ],

    'create-category' => [
        'controller' => 'CategoryController',
        'action' => 'createCategory'
    ],

    'edit-category' => [
        'controller' => 'CategoryController',
        'action' => 'editCategory'
    ],

    'update-category' => [
        'controller' => 'CategoryController',
        'action' => 'updateCategory'
    ],

    'delete-category' => [
        'controller' => 'CategoryController',
        'action' => 'deleteCategory'
    ],
];