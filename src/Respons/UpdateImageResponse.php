<?php


namespace App\Respons;

class UpdateImageResponse
{
    public $id;
    public $image;
    public $project;


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
    public function getProject(): ?string
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