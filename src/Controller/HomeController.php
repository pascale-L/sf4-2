<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * voir fichier ProductRepository
     * page d'accueil , affichage des nouveaux produits
     * @Route("/", name="home")
     */
    public function index(ProductRepository $repository)
    {
        // findALL() / findBy() / findOneBy() /find()
        // findBy() va effectuer une comparaison d'égalité, alors que nous souhaitons effectuer une comparaison de supériorité
        //*solution: créer notre propre méthode dans le ProductRepository     (findNews)
        /*$repository->findBy([
            'createdAt' => new \DateTime('-1 month')
           ]);*/

           // On utilise notre propre méthode pour récupérer les nouveautés
           $result = $repository->findNews();
        
        
        return $this->render('home/index.html.twig', [
            'new_products' => $result
        ]);
    }
}
