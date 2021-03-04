<?php
    use Core\App;

    $app->router->add('devedor/new', 'DevedoresController::new');
    $app->router->add('devedor', 'DevedoresController::listAll');
    $app->router->add('dividas/view', 'DividasController::devedor');
    $app->router->add('dividas/new', 'DividasController::new');
    $app->router->add('dividas/paid', 'DividasController::paid');
    $app->router->add('dividas/update', 'DividasController::update');
    $app->router->add('enderecos', 'EnderecosController::index');