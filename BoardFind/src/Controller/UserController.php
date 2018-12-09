<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UserController extends AbstractController
{
//    /**
//     * @Route("/EventsAndPeople/Register", name="Register")
//     */
//    public function index()
//    {
//        // you can fetch the EntityManager via $this->getDoctrine()
//        // or you can add an argument to your action: index(EntityManagerInterface $entityManager)
//        $entityManager = $this->getDoctrine()->getManager();
//
//        $user = new User();
//        $user->setUsername('TheFirstUser');
//        $user->setPassword('ThePassword');
//
//        // tell Doctrine you want to (eventually) save the Product (no queries yet)
//        $entityManager->persist($user);
//
//        // actually executes the queries (i.e. the INSERT query)
//        $entityManager->flush();
//
//        return new Response('Saved new product with id '.$user->getId());
//        return $this->render('home/RegisterForm.html.twig');
//    }
    /**
     * @Route("/EventsAndPeople/Register", name="Register")
     */
    public function news(Request $request)
    {
        // creates a task and gives it some dummy data for this example
        $user = new User();
//        $user->setUsername('Write a blog post');
//        $user->setPassword('zdr');
//        $user->setEmail('tomorrow');

        $form = $this->createFormBuilder($user)
            ->add('username', TextType::class)
            ->add('email', TextType::class)
            ->add('password', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Create User'))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            return $this->redirectToRoute('task_success');
        }
        return $this->render('home/RegisterForm.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    /**
     * @Route("/EventsAndPeople/task_success", name="task_success")
     */
    public function newss()
    {
        return $this->render('home/Succes.html.twig');
    }
}
