<?php


namespace App\Respons;

class CreateProjectResponse
{
    public $id;
    public $projectName;
    public $description;
    public $image;
   
    
     /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }
    /**
     * @return mixed
     */
    public function getProjectName(): ?string
    {
        return $this->projectName;
    }

    /**
     * @param mixed $projectName
     */
    public function setProjectName(string $projectName): self
    {
        $this->projectName = $projectName;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    /**
     * @param mixed $description
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

     /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image): void
    {
        $this->image = $image;
    }

}