<?php
namespace App\Manager;

use App\AutoMapping;
use App\Entity\Project;
use App\Repository\ProjectRepository;
use App\Request\CreateProjectRequest;
use App\Request\DeleteRequest;
use App\Request\GetByIdRequest;
use App\Request\UpdateProjectRequest;
use Doctrine\ORM\EntityManagerInterface;

class ProjectManager
{
    private $entityManager;
    private $projectRepository;
    private $autoMapping;
    
    private $imageRepository;

    public function __construct(EntityManagerInterface $entityManagerInterface,
        ProjectRepository $projectRepository, AutoMapping $autoMapping) {
        $this->entityManager = $entityManagerInterface;
        $this->projectRepository = $projectRepository;
        $this->autoMapping = $autoMapping;
    }

    public function create(CreateProjectRequest $request)
    {

        $projectEntity = $this->autoMapping->map(CreateProjectRequest::class, Project::class, $request);

        $this->entityManager->persist($projectEntity);
        $this->entityManager->flush();
        $this->entityManager->clear();
        return $projectEntity;
    }
    public function getAll()
    {
        $data = $this->projectRepository->getAll();

        return $data;
    }

    public function getProjectById(GetByIdRequest $request)
    {
        return $result = $this->projectRepository->findProjectAndImagesByld($request->getId());
    }

    public function delete(DeleteRequest $request)
    {
        
        $project = $this->projectRepository->findProjectByld($request->getId());
        
        if (!$project) {
            // return new Response(['data'=>'this project  is not found']);

        } else {
            
            $this->entityManager->remove($project);
            $this->entityManager->flush();
        }
        return $project;
    }
    public function update(UpdateProjectRequest $request)
    {
        $projectEntity = $this->projectRepository->findProjectByld($request->getId());
        if (!$projectEntity) {

        } else {
            $projectEntity = $this->autoMapping->mapToObject(UpdateProjectRequest::class,
                project::class, $request, $projectEntity);
            $this->entityManager->flush();
            return $projectEntity;
        }
    }

}
