<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Devis;


use Symfony\Component\HttpFoundation\Request; // Nous avons besoin d'accéder à la requête pour obtenir le numéro de page
use Knp\Component\Pager\PaginatorInterface; // Nous appelons le bundle KNP Paginator


class DevisController extends AbstractController
{
    /**
     * @Route("/devis", name="devis" )
     */
    public function index(Request $request, PaginatorInterface $paginator): Response
    {
           if(!empty($_GET['matric']))
           {
            $id=$_GET['matric'];
           }
           else {
               $id='';
           }
         
       
       
        $em = $this->getDoctrine()
                ->getManager();
                $devis = $paginator->paginate(
                    $devis = $em->getRepository(Devis::class)->showDevis($id),
                    $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
                    6 // Nombre de résultats par page
                );
      

        
        return $this->render('devis/index.html.twig', [
            'controller_name' => 'DevisController',
            'devis' => $devis,
        ]);
    }
}
