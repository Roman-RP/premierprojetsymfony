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
        return  $this->render('blog/author/one.html.twig',['id'=>$id]);
    }

    /**
     * @return Response
     * @Route("/blog/auteur", name="show_all_author")
     */
    public function showAllAutor()
    {
        return $this->render('blog/author/all.html.twig');
    }

    /**
     * @return Response
     * @Route("/blog/auteur/create", name="create_author")
     */
    public function createAuthor()
    {
        return $this->render('blog/author/create.html.twig');
    }

    /**
     * @return Response
     * @Route("/blog/auteur/edit", name="edit_author")
     */
    public function editAuthor()
    {
        return $this->render('blog/author/edit.html.twig');
    }

    /**
     * @return Response
     * @Route("/blog/auteur/delete",name="delete_author")
     */
    public function deleteAuthor()
    {
        return $this->render('blog/author/delete.html.twig');
    }


}