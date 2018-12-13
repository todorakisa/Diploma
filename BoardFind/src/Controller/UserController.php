<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Form\UserType;

class UserController extends AbstractController
{
    /**
     * @Route("/EventsAndPeople/Register", name="Register")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function Register(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

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
    /**
     * @Route("/EventsAndPeople/Login", name="Login")
     */
    public function login(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            return $this->redirectToRoute('task_success');
        }
        return $this->render('home/LoginForm.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
