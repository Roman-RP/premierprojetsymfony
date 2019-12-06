<?php
namespace App\Controller;

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
     * @param $id
     * @return Response
     * @Route("/blog/auteur/id/{id}", name="show_author_by_id")
     */
    public function showOneAuthorById(int $id)
    {
        return  new Response("auteur id:$id",200);
}

    /**
     * @return Response
     * @Route("/blog/auteur", name="show_all_author")
     */
    public function showAllAutor()
    {
        return new Response("Tous les auteurs",200);
    }

    /**
     * @return Response
     * @Route("/blog/auteur/create", name="create_author")
     */
    public function createAuthor()
    {
        return new Response("Créer un auteur ici", 200);
    }

    /**
     * @return Response
     * @Route("/blog/auteur/edit", name="edit_author")
     */
    public function editAuthor()
    {
        return new Response("Ici on modifie les auteurs",200);
    }

    /**
     * @return Response
     * @Route("/blog/auteur/delete",name="delete_author")
     */
    public function deleteAuthor()
    {
        return new Response("ici on supprime les auteurs!", 200);
    }


}