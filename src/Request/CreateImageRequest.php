<?php

namespace App\Request;

class CreateImageRequest
{
    
    public $id;
    public $image;
    public $project;

    /**
     * @return mixed
     */
    public function getId(): ?int
    {
        return $this->id;
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
    public function getProject()
    {
        return $this->project;
    }

    /**
     * @param mixed $project
     */
    public function setProject($project): void
    {
        $this->project = $project;

    }
}
