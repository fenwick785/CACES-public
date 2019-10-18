<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{
   
    //
    //-------- CRUD USER -----------
    //

    // -------------- LIST USER ------------------


    /**
     * @route("/admin/user", name="admin_user_list")
     */
    public function adminUser()
    {
        //1 : Récupérer tous les user
        $repo = $this->getDoctrine()->getRepository(User::class);
        $user = $repo->findBy(
            ['role'=> 'ROLE_USER'],
        );


        //2 : Afficher une vue (admin/user_list.html.twig), dans laquelle on va faire un dump() de tous les user
        return $this->render('admin/user_list.html.twig', [
            'user' => $user
        ]);
    }

        // --------------- DELETE USER -----------------

    /**
     * @route("admin/user/delete{id}", name="admin_user_delete")
     */
    public function adminUserDelete($id)
    {

        $manager = $this->getDoctrine()->getManager();
        $user = $manager->find(User::class, $id);

        $manager->remove($user);
        $manager->flush();

        $this->addFlash('success', 'Le membre n°' . $id . ' a bien été supprimé !');
        return $this->redirectToRoute('admin_user_list');
    }

        // ----------------- UPDATE USER -------------

    /**
     * @route("admin/user/update{id}", name="admin_user_update")
     */
    public function adminUserUpdate($id, Request $request)
    {

        $manager = $this->getDoctrine()->getManager();
        $user = $manager->find(User::class, $id); 

        $form = $this->createForm(UserType::class, $user, [
            'action' => 'admin',
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($user);

            $manager->flush();

            $this->addFlash('success', 'Le membre n°' . $id . ' a bien été modifié !');
            return $this->redirectToRoute('admin_user_list');
        }

        return $this->render('admin/user_form.html.twig', [
            'userForm' => $form->createView(),
            'action' => 'update_user',
        ]);
    }

}
