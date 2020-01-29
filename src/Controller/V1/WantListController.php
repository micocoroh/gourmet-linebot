<?php

namespace App\Controller\V1;

use Symfony\Component\HttpFoundation\JsonResponse;

class WantListController
{
    public function index()
    {
        $number = random_int(0, 100);
        return new JsonResponse(['data' => $number]);
    }
}
