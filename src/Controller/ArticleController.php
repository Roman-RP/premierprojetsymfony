<?php
namespace App\Controller;

use App\CRUD\Blog\ArticleCRUD;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



/**
 * Class ArticleController
 * @package App
 */
class ArticleController extends AbstractController
{
    /**
     * @param ArticleCRUD $articleCRUD
     * @param $id
     * @return Response
     * @Route("/blog/article/id/{id}", name="show_article_by_id")
     */
    public function showOneById(ArticleCRUD $articleCRUD, $id)
    {
        /**
         * @var Article $article
         */
        $article = $articleCRUD->getOneById($id);

        return $this->render('blog/articles/one.html.twig', ['article'=>$article]);

    }

    /**
     * @param Request $request
     * @return Response
     * @Route("/blog/article", name="show_all_articles")
     */
    public function showAll(ArticleCRUD $articleCRUD)
    {
        $articles=$articleCRUD->getAll();

        return $this->render('blog/articles/all.html.twig', ['articles'=>$articles]);
    }

    /**
     * @param Request $request
     * @return Response
     * @Route("blog/article/create", name="create_article")
     */
    public function createArticle(Request $request)
    {
        return $this->render('blog/articles/create.html.twig');
    }

    /**
     * @param Request $response
     * @return Response
     * @Route("/blog/article/edit", name="edit_article")
     */
    public function editArticle(Request $response)
    {
        return $this->render('blog/articles/edit.html.twig');
    }

    /**
     * @param Request $response
     * @return Request|Response
     * @Route("/blog/article/delete",name="delete_article")
     */
    public function deleteArticle(Request $response)
    {
        return $this->render('blog/articles/delete.html.twig');
    }
}