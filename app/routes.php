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


    // Post Routes
    'post' => [
        'controller' => 'PostController',
        'action' => 'index'
    ],

    'create-post' => [
        'controller' => 'PostController',
        'action' => 'createPost'
    ],

    'edit-post' => [
        'controller' => 'PostController',
        'action' => 'editPost'
    ],

    'update-post' => [
        'controller' => 'PostController',
        'action' => 'updatePost'
    ],

    'delete-post' => [
        'controller' => 'PostController',
        'action' => 'deletePost'
    ],


    // Comment Routes
    'comment' => [
        'controller' => 'CommentController',
        'action' => 'index'
    ],

    'create-comment' => [
        'controller' => 'CommentController',
        'action' => 'createComment'
    ],

    'edit-comment' => [
        'controller' => 'CommentController',
        'action' => 'editComment'
    ],

    'update-comment' => [
        'controller' => 'CommentController',
        'action' => 'updateComment'
    ],

    'delete-comment' => [
        'controller' => 'CommentController',
        'action' => 'deleteComment'
    ],

    // Image Routes
    'image' => [
        'controller' => 'ImageController',
        'action' => 'index'
    ],

    'create-image' => [
        'controller' => 'ImageController',
        'action' => 'createImage'
    ],

    'update-image' => [
        'controller' => 'ImageController',
        'action' => 'updateImage'
    ],

    'delete-image' => [
        'controller' => 'ImageController',
        'action' => 'deleteImage'
    ],
];