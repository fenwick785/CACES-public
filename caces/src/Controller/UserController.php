<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserController extends AbstractController
{
    /**
    * @Route("/register", name="register")
    */
    public function register(Request $request, UserPasswordEncoderInterface $encoder)
    {
        try {
            $user = new User; //objet vide
            // On récupère le formulaire
            $form = $this->createForm(UserType::class, $user, ['action' => 'register']);
            // On récupère les infos saisies dans le formulaire ($_POST)
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $manager = $this->getDoctrine()->getManager();
                $manager->persist($user);
                // Enregistrer le $produit dans le système 
                $user->setRole('ROLE_USER');
                $password = $user->getPassword();
                // on encode selon l'algo choisi dans security.yaml
                $password_crypte = $encoder->encodePassword($user, $password);
                $user->setPassword($password_crypte);
                $manager->flush();
                // va enregistrer $user en BDD
                $this->addFlash('success', 'Votre compte a bien été créé');
                return $this->redirectToRoute('app_login');
            }
        } catch (UniqueConstraintViolationException $e) {
            $this->addFlash('errors', 'Votre compte n\'a pas été crée, le pseudo ou l\'email utilisé existe déjà');
        }

        return $this->render('user/register.html.twig', [
            'userForm' => $form->createView()
        ]);
    }


    /**
     * @route("/profil", name="profil")
     */
    public function profil(){
        return $this->render('user/index.html.twig', []);
    }

    /**
     * @route("/profil/update", name="profil_update")
     */
    public function profilUpdate(Request $request){

        $user = $this->getUser();

        $manager = $this->getDoctrine()->getManager();
        $user = $manager->find(User::class, $user);

        $form = $this -> createForm(UserType::class, $user);

        $password = $user->getPassword();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($user);
            $user->setPassword($password);

            $manager->flush();

            $this->addFlash('success', 'Votre profil a bien été modifié !');
            return $this->redirectToRoute('profil');
        }


        return $this->render('user/register.html.twig', [
            'userForm' => $form->createView(),
            'action' => 'modifier le profil',
        ]);
        // return $this->render('user/update.html.twig', [
        //     'userForm' => $form->createView(),
        // ]);
    }
}


