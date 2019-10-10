<?php

namespace App\Controller;

use App\Entity\Lesson;
use App\Entity\Question;
use App\Entity\UserLesson;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LearnController extends AbstractController
{
    /**
     * @Route("/learn", name="learn")
     */
    public function learn()
    {

        $user = $this->getUser();
        

        $learnState = $this
            ->getDoctrine()
            ->getRepository(UserLesson::class)
            ->findBy([
                'idUser' => $user,
                'state' => 'comprises',
            ]);
        
        $lesson = $this 
            ->getDoctrine()
            ->getRepository(Lesson::class)
            ->findAll();
            

        return $this->render('learn/index.html.twig', [
            'learnState' => $learnState,
            'lesson' => $lesson,
        ]);
    }

    /**
     * @Route("/learn/chap1", name="learn_chap1")
     */
    public function learnChap1()
    {
        $user = $this->getUser();
        // on récupère les informations de l'utilisateur connecté

        $lesson = $this
            ->getDoctrine()
            ->getRepository(Lesson::class)
            ->findBy([
                'Chapter' => 1,
            ]);
        // $lesson contient toutes les leçons dont le "Chapter == 1", c'est a dire les leçons du chapitre 1

        $userLessonComprise = $this
            ->getDoctrine()
            ->getRepository(UserLesson::class)
            ->findBy([
                'idUser' => $user,
            ]);
        // $userLessonComprise contient toutes les leçons présentent dans les liste 'comprises' ou 'non comprises' de notre utilisateur connecté


        return $this->render('learn/chap1/chapitre1.html.twig', [
            'userLessonComprise' => $userLessonComprise,
            'lesson' => $lesson,
        ]);
        // On transmet ces informations a la vue 'learn/chap1/chapitre1.html.twig'
    }

    /**
     * @Route("/learn/chap2", name="learn_chap2")
     */
    public function learnChap2()
    {

        $user = $this->getUser();

        $lesson = $this
            ->getDoctrine()
            ->getRepository(Lesson::class)
            ->findBy([
                'Chapter' => 2,
            ]);
        $userLessonComprise = $this
            ->getDoctrine()
            ->getRepository(UserLesson::class)
            ->findBy([
                'idUser' => $user,
            ]);

        return $this->render('learn/chap2/chapitre2.html.twig', [
            'userLessonComprise' => $userLessonComprise,
            'lesson' => $lesson,
        ]);
    }

    /**
     * @Route("/learn/chap3", name="learn_chap3")
     */
    public function learnChap3()
    {

        $user = $this->getUser();

        $lesson = $this
            ->getDoctrine()
            ->getRepository(Lesson::class)
            ->findBy([
                'Chapter' => 3,
            ]);
        $userLessonComprise = $this
            ->getDoctrine()
            ->getRepository(UserLesson::class)
            ->findBy([
                'idUser' => $user,
            ]);



        return $this->render('learn/chap3/chapitre3.html.twig', [
            'userLessonComprise' => $userLessonComprise,
            'lesson' => $lesson,
        ]);
    }

    /**
     * @Route("/learn/chap4", name="learn_chap4")
     */
    public function learnChap4()
    {

        $user = $this->getUser();

        $lesson = $this
            ->getDoctrine()
            ->getRepository(Lesson::class)
            ->findBy([
                'Chapter' => 4,
            ]);
        $userLessonComprise = $this
            ->getDoctrine()
            ->getRepository(UserLesson::class)
            ->findBy([
                'idUser' => $user,
            ]);
        return $this->render('learn/chap4/chapitre4.html.twig', [
            'userLessonComprise' => $userLessonComprise,
            'lesson' => $lesson,
        ]);
    }

    /**
     * @Route("/learn/chap5", name="learn_chap5")
     */
    public function learnChap5()
    {


        $user = $this->getUser();

        $lesson = $this
            ->getDoctrine()
            ->getRepository(Lesson::class)
            ->findBy([
                'Chapter' => 5,
            ]);
        $userLessonComprise = $this
            ->getDoctrine()
            ->getRepository(UserLesson::class)
            ->findBy([
                'idUser' => $user,
            ]);
        return $this->render('learn/chap5/chapitre5.html.twig', [
            'userLessonComprise' => $userLessonComprise,
            'lesson' => $lesson,
        ]);
    }

    /**
     * @Route("/learn/chap6", name="learn_chap6")
     */
    public function learnChap6()
    {

        $user = $this->getUser();

        $lesson = $this
            ->getDoctrine()
            ->getRepository(Lesson::class)
            ->findBy([
                'Chapter' => 6,
            ]);
        $userLessonComprise = $this
            ->getDoctrine()
            ->getRepository(UserLesson::class)
            ->findBy([
                'idUser' => $user,
            ]);
        return $this->render('learn/chap6/chapitre6.html.twig', [
            'userLessonComprise' => $userLessonComprise,
            'lesson' => $lesson,
        ]);
    }

    /**
     * @Route("/learn/chap7", name="learn_chap7")
     */
    public function learnChap7()
    {


        $user = $this->getUser();

        $lesson = $this
            ->getDoctrine()
            ->getRepository(Lesson::class)
            ->findBy([
                'Chapter' => 7,
            ]);
        $userLessonComprise = $this
            ->getDoctrine()
            ->getRepository(UserLesson::class)
            ->findBy([
                'idUser' => $user,
            ]);
        return $this->render('learn/chap7/chapitre7.html.twig', [
            'userLessonComprise' => $userLessonComprise,
            'lesson' => $lesson,
        ]);
    }

    /**
     * @route("learn/prenium/{id}", name="lesson")
     */
    public function lessonDetail($id, Request $request){
        $manager = $this->getDoctrine()->getManager();
        $user = $this->getUser();

        $lesson = $manager->find(Lesson::class, $id);


        $repository = $this->getDoctrine()->getRepository(Question::class);

        // la variable $idLesson corerspond a l'idLesson de la leçon en question
        // l'idLesson correspond au theme de la leçon afin que les questions posées a la fin de la lecon, correspondent a ce qui a été vu au cours de la leçon
        $idLesson = $lesson->getIdLesson();
        $testLearn = $repository -> findQuestionLearn($idLesson);

        $userLesson = $this
                    ->getDoctrine()
                    ->getRepository(UserLesson::class)
                    ->findBy([
                        'idUser' => $user,
                    ]);

        return $this->render('learn/lesson.html.twig', [
            'lesson' => $lesson,
            'learn' => $testLearn,
            'userLesson' => $userLesson,
            'user' => $user,
        ]);
}
        /**
         * @route("/learn/prenium/test/{id}", name="learn_test")
         */
        public function learnTest(PaginatorInterface $paginator, Request $request, $id){
            $manager = $this->getDoctrine()->getManager();
            $lesson = $manager->find(Lesson::class, $id);

            $repository = $this->getDoctrine()->getRepository(Question::class);




            // la variable $idLesson corerspond a l'idLesson de la leçon en question
            // l'idLesson correspond au theme de la leçon afin que les questions posées a la fin de la lecon, correspondent a ce qui a été vu au cours de la leçon
            
            $idLesson = $lesson->getIdLesson(); // on récupère l'idLesson de la leçon en question
            $testLearn = $paginator->paginate( // on créé la pagination
                $repository -> findQuestionLearn($idLesson), // on appel les éléments que l'on souhaite "paginer"
                $request->query->getInt('page', 1), // par défaut on se positionne a la page 1
                1 // on souhaite afficher qu'une seule question par page
            );

            
            
            return $this->render('learn/learn_test.html.twig', [
                'learn' => $testLearn,
            ]);
        }

        /**
         * @route("/learn/prenium/{id}/{state}", name="learn_finish")
         */
        public function learnFinsh($state, $id, ObjectManager $manager){

            $user = $this->getUser();
            // on récupère les infos sur l'utilisateur connecté

            $lesson = $manager->find(Lesson::class, $id);
            // on récupère la leçon que l'on souhaite, selon son ID


            $listUserAAjouter = $this
        // On cherche en BDD si il y a une ligne où les champs :
            //id_user_id correspond a l'id du user connecté
            //lesson corespond a la leçon avec laquelle on interagie
            //state correspond a l'état que l'on souhaite attribuer a notre leçon (comprise ou non comprise)
            ->getDoctrine()
            ->getRepository(UserLesson::class)
            ->findBy([
                'idUser' => $user,
                'idLesson' => $lesson,
                'state' => $state
            ]);

            $listUserAModifier = $this
        // On cherche en BDD si il y a une ligne où les champs :
            //id_user_id correspond a l'id du user connecté
            //lesson corespond a la leçon avec laquelle on interagie
            ->getDoctrine()
            ->getRepository(UserLesson::class)
            ->findOneBy([
                'idUser' => $user,
                'idLesson' => $lesson,

            ]);

            if ($listUserAAjouter) {
                // on affiche un message d'erreur comme quoi nous avons déja cette leçon dans notre liste
                $this->addFlash('errors', 'Cette leçon <b>' . $lesson->getTitle() .  '</b> est déjà dans la liste !');
            }
            if ($listUserAModifier) {
                // on remplace l'état dans le champ state
                $listUserAModifier->setState($state);
                $manager->persist($listUserAModifier);
                $manager->flush();
                $this->addFlash('success', 'la leçon <b>' . $lesson->getTitle() .  '</b> a changé de liste !');
            }
            else{
            $userLesson = new UserLesson;

        

            $userLesson->setIdUser($user);
            $userLesson->setIdLesson($lesson);
            $userLesson->setState($state);

            $user->addUserlesson($userLesson);
            $manager->persist($userLesson);
            $manager->flush();
            $this->addFlash('success','La leçon <b>'.$lesson->getTitle().'</b> est mise dans la liste des leçons '. $state .'!');

            }

            return $this->redirectToRoute('learn', [
                'id' => $id,
            ]);
        }


    /**
    * @Route("/learn/prenium/remove/{id}/{state}", name="learn_remove_list" )
    */
    public function learnRemoveList($state, $id, ObjectManager $manager)
    {
        // fonction permettant de supprimer une série de sa liste 
        $user = $this->getUser();
        $lesson = $manager->find(Lesson::class, $id);

        $listUserASupp = $this
        // On cherche en BDD si il y a une ligne où les champs :
            //id_user_id correspond a l'id du user connecté
            //serie_id corespond a l'id de la série avec laquelle on interagie
            //state correspond a l'état que l'on souhaite attribuer a notre série
            ->getDoctrine()
            ->getRepository(UserLesson::class)
            ->findOneBy([
                'idUser' => $user,
                'idLesson' => $lesson,
                'state' => $state
            ]);

        if ($listUserASupp) {
            $this->addFlash('success', 'La leçon <b>' . $lesson->getTitle() .  '</b> a été supprimée de la liste: leçons ' . $state . ' !');
            $manager->remove($listUserASupp);
            $manager->flush();
        }

        return $this->redirectToRoute('learn', [
            'id' => $id,
        ]);
    }
}
