<?php

namespace App\Service;

use App\AutoMapping;
use App\Entity\Project;
use App\Manager\ImageManager;
use App\Manager\ProjectManager;
use App\Request\CreateImageRequest;
use App\Respons\CreateProjectResponse;
use App\Respons\GetImageByIdResponse;
use App\Respons\GetProjectByIdResponse;
use App\Respons\GetProjectsResponse;
use App\Respons\UpdateProjectResponse;

use App\Request\UpdateProjectRequest;
use App\Request\UpdateImageRequest;

class ProjectService
{
    private $ProjectManager;
    private $autoMapping;
    private $imageManager;

public function createName($name){
    // $projectResult = $this->projectManager->create($request);
    // return $projectResult;
  dump($name);
    return $name;

}

    public function __construct( ProjectManager $projectManager, AutoMapping $autoMapping, ImageManager $imageManager)
    {
        $this->projectManager = $projectManager;
        $this->autoMapping = $autoMapping;
        $this->imageManager = $imageManager;
    }

    public function create($request)
    {
        $projectResult = $this->projectManager->create($request);

        $response = $this->autoMapping->map(Project::class, CreateProjectResponse::class,
            $projectResult);
        $projectImage = new CreateImageRequest();
        $projectImage->image = $request->getImage();
        $projectImage->project = $response->getId();
        $imageResult = $this->imageManager->create($projectImage);
        $response->setImage($request->getImage());

        return $response;
    }

    public function getAll()
    {
        $result = $this->projectManager->getAll();
        $response = [];
        foreach ($result as $row) {
            $response[] = $this->autoMapping->map('array'::class, GetProjectsResponse::class, $row);
        }

        return $response;
    }

    public function getProjectById($request)
    {
        $result = $this->projectManager->getProjectById($request);

        foreach ($result as $row) {
            $response[] = $this->autoMapping->map('array', GetProjectByIdResponse::class, $row);
        }
        return $response;
    }

    public function delete($request)
    {
        $imageResult = $this->imageManager->delete($request);
        $projectResult = $this->projectManager->delete($request);
        $response = $this->autoMapping->map(Project::class, GetProjectByIdResponse::class, $projectResult);
       
        return $response;

    }
    public function update($request)
    {
        $projectResult = $this->projectManager->update($request);
        $response = $this->autoMapping->map(Project::class, UpdateProjectResponse::class, $projectResult);

        $projectImage = new UpdateImageRequest();
        $projectImage->image   = $response->getImage();
        $projectImage->project = $response->getId();

        $projectResult = $this->imageManager->update($projectImage);
        $response->setImage($request->getImage());
        return $response;
    }

}
