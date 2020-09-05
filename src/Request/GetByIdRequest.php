<?php


namespace App\Request;


class GetByIdRequest
{
public $id;

    /**
     * GetByIdRequest constructor.
     * @param $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return integer
     */
    public function getId():int
    {
        return $this->id;
    }

    /**
     * @param integer $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

}