<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ODM\MongoDB\DocumentManager;
use App\Document\Client;


class MongoTetsController extends AbstractController
{
    #[Route('/mongo/tets', name: 'app_mongo_tets')]
    public function index(DocumentManager $dm): Response
    {
        $client = new Client();
        $client->setFirstName('test');

        $dm->persist($client);
        $dm->flush();

        dd($client->getFirstName());

        return $this->render('mongo_tets/index.html.twig', [
            'controller_name' => 'MongoTetsController',
        ]);
    }
}
