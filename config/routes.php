<?php

use App\Controller\V1\WantListController;
use App\Controller\V1\ThankController;

use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function (RoutingConfigurator $routes) {

    $routes->add('api_v1_want_list_index', '/api/v1/want_list')
        ->controller([WantListController::class, 'index']);

    $routes->add('api_v1_thank_index', '/api/v1/thank')
        ->controller([ThankController::class, 'index'])
        ->methods(['GET']);

    $routes->add('api_v1_thank_show', '/api/v1/thank/{id}')
        ->controller([ThankController::class, 'show'])
        ->methods(['GET']);

    $routes->add('api_v1_thank_create', '/api/v1/thank')
        ->controller([ThankController::class, 'create'])
        ->methods(['POST']);

    // if the action is implemented as the __invoke() method of the
    // controller class, you can skip the ', method_name]' part:
    // ->controller([BlogController::class])
};
