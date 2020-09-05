<?php
namespace App\Manager;

use App\AutoMapping;

use App\Entity\Orders;
use App\Repository\OrdersRepository;
use App\Request\CreateOrderRequest;
use App\Manager\ProjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Project;
use App\Entity\User;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Flex\Response;

class OrderManager
{
    private $entityManager;
    private $orderRepository;
    private $autoMapping;   

    public function __construct(EntityManagerInterface $entityManagerInterface,
    OrdersRepository $orderRepository, AutoMapping $autoMapping)
    {
        $this->entityManager = $entityManagerInterface;
        $this->orderRepository=$orderRepository;
        $this->autoMapping = $autoMapping;
    }

    public function create(CreateOrderRequest $request)
    {
        
        if($request->project && $request->user){
            $project= $this->entityManager->getRepository(Project::class)
            ->find($request->project);
            $request->setProject($project);
            $user= $this->entityManager->getRepository(User::class)
            ->find($request->user);
            $request->setUser($user);
        }
    
        $orderEntity = $this->autoMapping->map(CreateOrderRequest::class, Orders::class, $request);
        $this->entityManager->persist($orderEntity);
        $this->entityManager->flush();
        $this->entityManager->clear();
        return $orderEntity;
    }
    
}
