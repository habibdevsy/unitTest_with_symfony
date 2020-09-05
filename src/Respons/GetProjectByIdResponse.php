<?php


namespace App\Respons;

class GetProjectByIdResponse
{
    public $projectName;
    public $description;
    public $image;
    
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
    public function getImage(): ?string
    {
        return $this->image;
    }
    /**
     * @param mixed $image
     */
    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }
}