<?php

namespace App\Controller;

use App\AutoMapping;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Request\CreateOrderRequest;
use App\Service\OrderService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OrderController extends BaseController
{
    private $orderService;
    private $autoMapping;
    /**
     * OrderController constructor.
     * @param OrderService $orderService
     */
    public function __construct(OrderService $orderService, AutoMapping $autoMapping)
    {
        $this->orderService = $orderService;
        $this->autoMapping = $autoMapping;
    }

    /**
     * @Route("/order/{idProject}/{idUser}", name="createOrder",methods={"POST"})
     * @param Request $request
     * @return Response
     */
    public function create(Request $request, $idProject, $idUser)
    {
        $data = json_decode($request, true);
        $request = $this->autoMapping->map(\stdClass::class, CreateOrderRequest::class, (object) $data);
        $request->setProject($idProject);
        $request->setUser($idUser);
         
        $result = $this->orderService->create($request, $idProject, $idUser);
       
        return $this->response($result, self::CREATE);        
    }
}
