<?php

namespace App\Controller;


use App\CRUD\Blog\AuteurCRUD;
use App\Entity\Auteur;
use App\Form\Blog\AuteurFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AuteurController
 * @package App\Controller
 */
class AuteurController extends AbstractController
{
    /**
     * @param AuteurCRUD $auteurCRUD
     * @param $id
     * @return Response
     * @Route("/blog/auteur/id/{id}", name="show_author_by_id")
     */
    public function showOneById(AuteurCRUD $auteurCRUD, $id)
    {
        /**
         * @var Auteur $auteur
         */
        $auteur = $auteurCRUD->getOneById($id);

        return $this->render('blog/author/one.html.twig', ['auteur' => $auteur]);
    }

    /**
     * @param AuteurCRUD $auteurCRUD
     * @return Response
     * @Route("/blog/auteur", name="show_all_author")
     */
    public function showAllAuthor(AuteurCRUD $auteurCRUD)
    {
        $auteurs = $auteurCRUD->getAll();
        return $this->render('blog/author/all.html.twig', ['auteurs' => $auteurs]);
    }


    /**
     * @param Request $request
     * @param AuteurCRUD $auteurCRUD
     * @return Response
     * @Route("/blog/auteur/create", name="create_author")
     */
    public function createAuthor(
        Request $request,
        AuteurCRUD $auteurCRUD
    )
    {
        //create empty auteur
        $auteur = new Auteur();

        //create form
        $form = $this->createForm(
            AuteurFormType::class,
            $auteur
        );

        //Handle form = submit
        $form->handleRequest($request);

        //treat submitted form
        if ($form->isSubmitted() && $form->isValid()) {
            //Persist
            $auteurCRUD->add($auteur);

            //redirect
            return $this->redirectToRoute('show_all_author');
        }
        //create and return template
        return $this->render('blog/author/create.html.twig',
            [
                'auteurForm' => $form->createView()
            ]);
    }


    /**
     * @param AuteurCRUD $auteurCRUD
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     * @Route("/blog/auteur/edit/{id}", name="edit_author")
     */
    public function editAuthor(AuteurCRUD $auteurCRUD, Request $request, $id)
    {
        // Get auteur
        $auteur = $auteurCRUD->getOneById($id);

        //create form
        $form = $this->createForm(
            AuteurFormType::class,
            $auteur
        );

        //Handle form = submit
        $form->handleRequest($request);

        //treat submitted form
        if ($form->isSubmitted() && $form->isValid()) {
            //Persist
            $auteurCRUD->update($auteur);

            //redirect
            return $this->redirectToRoute('show_author_by_id', ['id' => $id]);
        }
        //create and return template
        return $this->render('blog/author/edit.html.twig',
            [
                'auteurForm' => $form->createView()
            ]);

    }


    /**
     * @param AuteurCRUD $auteurCRUD
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     *@Route("/blog/auteur/delete/{id}",name="delete_author")
     */
    public function deleteAuthor(AuteurCRUD $auteurCRUD, $id)
    {
        // get auteur
        $auteur = $auteurCRUD->getOneById($id);

        //Delete
        $auteurCRUD->delete($auteur);

        // redirect
        return $this->redirectToRoute('show_all_author');

    }


}