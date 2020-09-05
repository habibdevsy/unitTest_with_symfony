<?php


namespace App\Respons;


class DeleteResponse
{
    public $id;

    /**
     * DeleteRequest constructor.
     * @param $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


}