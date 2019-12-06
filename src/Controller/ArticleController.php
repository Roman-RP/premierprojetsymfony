<?php
namespace App\Controller;

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
     * @param $id
     * @param Request $request
     * @return Response
     * @Route("/blog/article/id/{id}", name="show_article_by_id")
     */
    public function showOneById(int $id, Request $request)
    {
        $response=new Response();
        $content="<html><body>Article id=$id</body></html>";
        $response->setContent($content);
        $response->setStatusCode(200);

        return $response;

    }

    /**
     * @param Request $request
     * @return Response
     * @Route("/blog/article", name="show_all_articles")
     */
    public function showAll(Request $request)
    {
        $response= new response();
        $content="<html><body>Liste de tous les articles</body></html>";
        $response->setContent($content);
        $response->setStatusCode(200);

        return $response;
    }

    /**
     * @param Request $request
     * @return Response
     * @Route("blog/article/create", name="create_article")
     */
    public function createArticle(Request $request)
    {
        $response=new response();
        $content="<html><body>Ici on est dans créer un article</body></html>";
        $response->setContent($content);
        $response->setStatusCode(200);

        return $response;
    }

    /**
     * @param Request $response
     * @return Response
     * @Route("/blog/article/edit", name="edit_article")
     */
    public function editArticle(Request $response)
    {
        $response=new response();
        $content="<html><body>Ici on peut modifier un article</body></html>";
        $response->setContent($content);
        $response->setStatusCode(200);

        return $response;
    }

    /**
     * @param Request $response
     * @return Request|Response
     * @Route("/blog/article/delete",name="delete_article")
     */
    public function deleteArticle(Request $response)
    {
        $response=new response();
        $content="<html><body>Ici on supprime des articles</body></html>";
        $response->setContent($content);
        $response->setStatusCode(200);

        return $response;
    }
}