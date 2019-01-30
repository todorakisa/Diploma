<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use App\Form\UserType;
use App\Form\UserLoginType;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class UserController extends AbstractController
{
    /**
     * @Route("/EventsAndPeople/Register", name="Register")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function register(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            $flashbag = $this->get('session')->getFlashBag();
            $flashbag->add("SuccessfullRegister", "You successfully registered in our site!");
            return $this->redirectToRoute('EventsAndPeople');
        }
        return $this->render('home/RegisterForm.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/EventsAndPeople/Logout", name="Logout")
     */
    public function logout()
    {
        $this->get('session')->clear();
        $flashbag = $this->get('session')->getFlashBag();
        $flashbag->add("SuccessfullLoggout", "You successfully logout from our site!");
        return $this->redirectToRoute('EventsAndPeople');
    }

    /**
     * @Route("/EventsAndPeople/Login", name="Login")
     */
    public function login(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserLoginType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted()) {
              $notTrueUser = $form->getData();
            $user = $this->getDoctrine()
                ->getRepository(User::class)
                ->findOneByPasswordAndEmailAndUsername($notTrueUser->getPassword(),$notTrueUser->getEmail(),$notTrueUser->getUsername());
            if (!$user) {
                throw $this->createNotFoundException(
                    'No product found for this email and password '
                );
            }
            $this->get('session')->set('user', $user);
            $flashbag = $this->get('session')->getFlashBag();
            $flashbag->add("SuccessfullLogin", "You successfully logged in our site!");
            return $this->redirectToRoute('EventsAndPeople');
        }
        return $this->render('home/LoginForm.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
