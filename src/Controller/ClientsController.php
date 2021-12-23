<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Clients;
use App\Form\ClientsType;
use App\Entity\Devis;
use App\Form\DevisType;
use App\Entity\Images;
use App\Entity\Services;
use App\Form\ImagesType;
use Symfony\Component\Security\Core\User\UserInterface;
use App\Entity\Vehicule;
use App\Form\VehiculeType;

use App\Entity\DevisOperation;

use App\Entity\Operation;
use App\Form\OperationType;

class ClientsController extends AbstractController
{
    /**
     * @Route("/clients", name="clients")
     */
    public function index():
        Response
        {

            return $this->render('clients/index.html.twig', ['controller_name' => 'ClientsController', ]);
        }

        /**
     * @Route("/valider", name="valider")
     */
    public function valider():Response
    {

        return $this->render('clients/valide.html.twig');
    }

        /**
         * @Route("/clients/add", name="clients_add")
         */
        public function add()
        {

            $em = $this->getDoctrine()
                ->getManager();

            $services = $em->getRepository(Services::class)
                ->showServices();
            $operation = $em->getRepository(Operation::class)
                ->showOperation();

            return $this->render('clients/add.html.twig', [

            'services' => $services, 'operation' => $operation,

            ]);
        }

        /**
         * @Route("/add", name="add")
         */
        public function adding(UserInterface $user)
        {
            $em = $this->getDoctrine()
                ->getManager();
            $serv = $em->getRepository(Services::class)
                ->showServices();
            $opr = $em->getRepository(Operation::class)
                ->showOperation();

            $clientFirstName = $_POST['clientFirstName'];
            $clientLastName = $_POST['clientLastName'];
            $clientEmail = $_POST['clientEmail'];
            $clientPhone = $_POST['clientPhone'];
            $clientAdresse = $_POST['clientAdresse'];
            $clientVille = $_POST['clientVille'];

            $client = new Clients();
            $client->setFirstName($clientFirstName);
            $client->setLastName($clientLastName);
            $client->setEmail($clientEmail);
            $client->setPhoneNumber($clientPhone);
            $client->setAdresse($clientAdresse);
            $client->setVille($clientVille);

            $entityManager = $this->getDoctrine()
                ->getManager();
            $entityManager->persist($client);
            $entityManager->flush();

            $matricule = $_POST['vehiculeMatricule'];
            $marque = $_POST['vehiculeMarque'];
            $modele = $_POST['vehiculeModele'];
            $chassie = $_POST['vehiculeNumberChassie'];
            $klm = $_POST['vehiculeKilometrage'];

            $vehicule = new Vehicule();
            $vehicule->setMatricule($matricule);

            $vehicule->setMarque($marque);
            $vehicule->setModele($modele);
            $vehicule->setNumberChassie($chassie);
            $vehicule->setKlm($klm);

            $entityManager->persist($vehicule);
            $entityManager->flush(); 
            
            $devis = new Devis();
            $devis->setClients($client);
            $devis->setUsers($user);
            $devis->setVehicule($vehicule);

            $tarif = 0; 

            foreach($_POST['operation_services'] as $ID_operation => $operation_services) {
                foreach($operation_services as $ID_service => $Price_service){ 
                    $devisop = new DevisOperation();
                    $devisop->setDevis($devis);
                    $devisop->setServices($em->getReference(Services::class , $ID_service));
                    $devisop->setOperation($em->getReference(Operation::class , $ID_operation ));
                    $tarif = $tarif + $Price_service ;
                    
                    

                    $devis->setTarifMo($tarif);
                    $devis->setTotalHt($tarif);
                    $entityManager->persist($devisop);
                    $entityManager->flush();
                }
            }
      


//die();





           /* for ($i = 0;$i <= $counterServ;$i++)
            {

                if (isset($operation[$i]))
                {

                    for ($j = 1;$j < $counterServ;$j++)
                    {
                        if (isset($operation[$i][$j]))
                        {

                            $devisop = new DevisOperation();
                            $devisop->setDevis($devis);
                            $devisop->setServices($em->getReference(Services::class , $operation[$i][$j]));

                            $devisop->setOperation($em->getReference(Operation::class , $srv[$j]));

                            $tarif = $tarif + $serv[$j]["servicePrice"];

                            var_dump($tarif);
                            $devis->setTarifMo($tarif);
                            $entityManager->persist($devisop);
                            $entityManager->flush();

                        }

                        $devis->setTotalHt(444);
                    }

                }

            }*/

            $entityManager->persist($devis);
            $entityManager->flush();

            return $this->render('clients/valide.html.twig', [

           // "countoper" => count($opr) , "countserv" => count($serv) , 'controller_name' => 'ClientsController',

            ]);
        }

    }
    
