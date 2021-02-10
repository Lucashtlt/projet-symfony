<?php

namespace App\Controller;
use App\Entity\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProduitController extends AbstractController
{
    /**
     * @Route("/produits", name="produits")
     */
    public function index(): Response
    {
        $produits = $this->getDoctrine()->getRepository(Produit::class)->Findall();

        return $this->render('produit/index.html.twig', [
            'produits' => $produits
        ]);
    }

    /**
     * @Route("/produit/{slug}", name="produit")
     * @param string $slug
     * Return Response
     */

    public function show(string $slug): Response
    {
        $produit = $this->getDoctrine()->getRepository(Produit::class)->FindOneBy(['Slug' => $slug]);

        if (!$produit) {
            throw $this->createNotFoundException(
                'No products found'
            );
        }

        return $this->render('produit/show.html.twig', [
            'produit' => $produit
        ]);
    }

}
