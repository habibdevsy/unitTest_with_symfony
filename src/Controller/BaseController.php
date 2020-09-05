<?php

namespace App\Controller;

use App\AutoMapping;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

class BaseController extends AbstractController
{
    private $serializer;
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }
    const STATE_OK = 200;
    const CREATE = ["created ","201"];
    const UPDATE=["updated","204"];
    const DELETE=["deleted","401"];
    const FETCH=["fetched","200"];

    /**
     * Returns a JSON response
     *
     * @param array $data
     * @param array $headers
     *
     * @return JsonResponse
     */

    public function respond($data, $headers = [])
    {
        return new JsonResponse($data, self::STATE_OK, $headers);
    }

    /**
     * Sets an error message and returns a JSON response
     * @param string $errors
     * @param array $headers
     * @return JsonResponse
     */
    public function respondWithErrors($errors, $headers = [])
    {
        $data = [
            'errors' => $errors,
        ];

        return new JsonResponse($data, $this->getStatusCode(), $headers);
    }

    /**
     * Returns a 401 Unauthorized http response
     *
     * @param string $message
     *
     * @return JsonResponse
     */
    public function respondUnauthorized($message = 'Not authorized!')
    {
        return $this->setStatusCode(401)->respondWithErrors($message);
    }

    public function response($result, $status) :jsonResponse
    {
        $encoders = [ new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $this->serializer=new Serializer($normalizers, $encoders);
                $result = $this->serializer->serialize($result, "json", [
                    'enable_max_depth' => true]);
        $response = new jsonResponse(["status_code" => $status[1],
            "msg" => $status[0]. " "."Successfully.",
            "Data" => json_decode($result)
            ]
        , Response::HTTP_OK);
        $response->headers->set('Access-Control-Allow-Headers', 'X-Header-One,X-Header-Two');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Methods', 'PUT');
        return $response;
    }
}
