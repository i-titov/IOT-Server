<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api', name: 'api_')]
class DeviceController extends AbstractController
{
    #[Route('/device', name: 'app_device', methods: ['POST'])]
    public function index(Request $request): JsonResponse
    {


        #if ($request['name'] !== $name && $request['password'] !== $password){
        #    return new JsonResponse('ok', 401);
       # }
        return new JsonResponse('ok', 200);
    }
    #[Route('/add-video', name: 'app_device', methods: ['post'])]
    public function addVideo(Request $request): JsonResponse
    {
        $device = new Device();
        $name = $device->getName();
        $password = $device->getPassword();

        if ($request['name'] !== $name && $request['password'] !== $password){
            return new JsonResponse('ok', '401');
        }
        return new JsonResponse('ok', '200');
    }
}
