<?php

use App\Base\Router;
use Pecee\SimpleRouter\SimpleRouter;
use App\Controllers\PortfoliosController;
use App\Controllers\WelcomeController;

Router::get('/', [WelcomeController::class, 'hello']);
Router::get('/portfolio', [PortfoliosController::class, 'index']);
Router::get('/test', function(){
    views('index');
});