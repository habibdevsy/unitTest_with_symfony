<?php

namespace App\Service;

use App\AutoMapping;
use App\Manager\OrderManager;
use App\Respons\CreateOrderResponse;
use App\Entity\Orders;

class OrderService
{
    private $orderManager;
    private $autoMapping;
    private $projectManager;
    public function __construct(OrderManager $orderManager, AutoMapping $autoMapping)
    {
        $this->orderManager  = $orderManager;
        $this->autoMapping   = $autoMapping;
    }

    public function create($request, $idProject, $idUser)
    {

        $request->setProject($request->getProject($idProject));
        $request->setUser($request->getUser($idUser));

        $orderResult = $this->orderManager->create($request);
        $orderResult->getProject($idProject);
        $orderResult->getUser($idUser);
       
        $response    = $this->autoMapping->map(Orders::class, CreateOrderResponse::class,
            $orderResult);

        return $response;
    }

}
