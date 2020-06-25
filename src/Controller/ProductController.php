<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * liste des produits
     * @Route("/product", name="product_list")
     */
    public function index(ProductRepository $repository)
    {

        //Récupération de tous les produits
        $product_list = $repository->findAll();


        return $this->render('product/index.html.twig', [
            'product_list' => $product_list
        ]);
    }


    /**
     * Grace au ParamConverter (installé par FrameworkExtraBundle)
     * symfony va récupérer l'entité Product qui correspond à l'identifiant dans l'URI
     * 
     * affiche les infos d'un produit
     * @Route("/product/{id}", name="product_show")
     */

    public function show(Product $product)
    {
        return $this->render('product/show.html.twig', [  
        'product' => $product

        ]);

    }
}
