<?php


namespace App\Respons;

class GetImagesResponse
{
    public $image;
    public $project;
    
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
    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getProject(): ?object 
    {
        return $this->project;
    }
    /**
     * @param mixed $project
     */
    public function setProject(?string $project): self
    {
        $this->project = $project;

        return $this;
    }

}