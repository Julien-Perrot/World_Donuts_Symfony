<?php

namespace App\Controller;

use App\Entity\Donut;
use App\Form\DonutType;
use App\Repository\DonutRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class DonutController extends AbstractController
{
    /**
     * @Route("/donut", name="donut")
     */
    public function index(DonutRepository $repo): Response
    {
        return $this->render('donut/index.html.twig', [
            'donuts' => $repo->findAll(),
        ]);
    }

    /**
     * @Route("/donut/{id}", name="un_donut")
     */
    public function afficherUnDonut(Donut $donut): Response 
    {
        return $this->render('donut/undonut.html.twig', [
            'donut' => $donut
        ]);
    }

  
    // @Route("/donut/nouveau", name="nouveau_donut", priority=1)
    
    // Ajouter un nouveau donut manuellement via le templates nouveau.html.twig
//     public function nouveauDonut(EntityManagerInterface $manager): Response
//    {
//        $donut = new Donut();
//        $donut->setName("L'Anglais");
//        $donut->setFilling("Pudding");
//        $donut->setPrice(7);
//        $donut->setDescription("Vraiment pas bon");

//        $manager->persist($donut);

//        $manager->flush();

//        return $this->render('donut/nouveau.html.twig');
//    } 

    /**
     * @Route("/donut/nouveau", name="nouveau_donut", priority=1)
     */
    public function nouveauDonut(Request $request, EntityManagerInterface $manager): Response
    {
        $donut = new Donut();

        $formulaireDonut = $this->createForm(DonutType::class, $donut);

        $formulaireDonut->handleRequest($request);

        if ( $formulaireDonut->isSubmitted() && $formulaireDonut->isValid() ){

            $manager->persist($donut);

            $manager->flush();

            return $this->redirectToRoute("un_donut", ['id'=>$donut->getId()]);
        }

        return $this->render('donut/nouveau.html.twig', [
            'formulaire' => $formulaireDonut->createView()
        ]);
    }

    /**
     * @Route("/donut/delete/{id}", name="delete_donut", priority=1)
     */
    public function delete(Donut $donut, EntityManagerInterface $manager): Response
    {
        $manager->remove($donut);
        $manager->flush();

        return $this->redirectToRoute("donut");
    }

} 
