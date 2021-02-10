<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Category;

class FirstController extends AbstractController
{
    /**
     * @Route("/", name="first")
     */
    public function index(): Response
    {
        $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();

        if (!$categories) {
            throw $this->createNotFoundException(
                'No categories found'
            );
        }
        
        return $this->render('first/index.html.twig', [
            'controller_name' => 'First_controller',
            'categories' => $categories,
        ]);
    }
}
