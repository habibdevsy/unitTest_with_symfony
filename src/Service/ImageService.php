<?php


namespace App\Service;
use Symfony\Component\VarDumper\Test\VarDumperTestTrait;

use App\AutoMapping;
use App\Entity\Images;
use App\Manager\ImageManager;
use App\Respons\CreateImageResponse;
use Symfony\Component\HttpFoundation\Request;
use App\Respons\GetImagesResponse;
use App\Respons\GetImageByIdResponse;
use App\Response\DeleteResponse;
use App\Respons\UpdateImageResponse;
use Symfony\Component\Routing\Exception\NoConfigurationException;
use Doctrine\ORM\NonUniqueResultException;

class ImageService

{
    private $imageManager;
    private $autoMapping;


    public function __construct(ImageManager $imageManager, AutoMapping $autoMapping)
    {
        $this->imageManager =$imageManager;
        $this->autoMapping = $autoMapping;
    }
public function testt(string $name1 , string $name2){
    
    return  $name1.$name2;
}
    public function create($request)
    {  
        $imageResult = $this->imageManager->create($request);
        $response    = $this->autoMapping->map(Images::class, CreateImageResponse::class,
            $imageResult);
        return $response;
    }
    
    
    public function getAll()
    {
        $result = $this->imageManager->getAll();
        $response=[];
        foreach ($result as $row)
            $response[] = $this->autoMapping->map(Images::class, GetImagesResponse::class, $row);
        return $response;
    }


    public function getImageById($request)
    {
        $result = $this->imageManager->getImageById($request);
        $response = $this->autoMapping->map(Images::class, GetImageByIdResponse::class, $result);
        return $response;
    }


    public function delete($request)
    {
        $result = $this->imageManager->delete($request);
        $response = $this->autoMapping->map(Images::class, GetImageByIdResponse::class, $result);
        //$error=[];
        if(!$response){
           $error=['error'=>"this project not found!!!"];
           return $error;
        }
        else{
        return $response;}
        // $response = new DeleteResponse($result->getId());
      
        // return $response;
          
    }
    public function update($request)
    {
        $imageResult = $this->imageManager->update($request);
        $response = $this->autoMapping->map(Images::class, UpdateImageResponse::class, $imageResult);
        $response->setImage($request->getImage());
        return $response;
    }
   

}