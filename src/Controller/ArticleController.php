<?php

namespace App\Controller;

use App\CRUD\Blog\ArticleCRUD;
use App\Entity\Article;
use App\Form\Blog\ArticleFormType;
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

        return $this->render('blog/articles/one.html.twig', ['article' => $article]);

    }

    /**
     * @param Request $request
     * @return Response
     * @Route("/blog/article", name="show_all_articles")
     */
    public function showAll(ArticleCRUD $articleCRUD)
    {
        $articles = $articleCRUD->getAll();

        return $this->render('blog/articles/all.html.twig', ['articles' => $articles]);
    }


    /**
     * @param Request $request
     * @param ArticleCRUD $articleCRUD
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     * @Route("blog/article/create", name="create_article")
     */
    public function createArticle(
        Request $request,
        ArticleCRUD $articleCRUD)
    {
        //create empty article
        $article = new Article();

        //create form
        $form = $this->createForm(
            ArticleFormType::class,
            $article
        );

        //Handle form = submit
        $form->handleRequest($request);

        //treat submitted form
        if ($form->isSubmitted() && $form->isValid())
        {
            $date=new \DateTime('now');
            $date->setTimezone(new \DateTimeZone('Europe/Paris'));
            $article->setDate($date);
            //Persist
            $articleCRUD->add($article);

            //redirect
            return $this->redirectToRoute('show_all_articles');
        }
        //create and return template
        return $this->render('blog/articles/create.html.twig',
            [
                'articleForm' => $form->createView()
            ]);

    }


    /**
     * @param \App\Controller\ArticleCRUD $articleCRUD
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     * @Route("/blog/article/edit/{id}", name="edit_article")
     */
        public function editArticle(ArticleCRUD $articleCRUD, Request $request, $id)
    {
        // Get article
        $article = $articleCRUD->getOneById($id);

        //create form
        $form = $this->createForm(
            ArticleFormType::class,
            $article
        );

        //Handle form = submit
        $form->handleRequest($request);

        //treat submitted form
        if ($form->isSubmitted() && $form->isValid()) {
            //Persist
            $articleCRUD->update($article);

            //redirect
            return $this->redirectToRoute('show_article_by_id', ['id' => $id]);
        }
        //create and return template
        return $this->render('blog/articles/edit.html.twig',
            [
                'articleForm' => $form->createView()
            ]);

    }


    /**
     * @param ArticleCRUD $articleCRUD
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route("/blog/article/delete/{id}",name="delete_article")
     */
    public function deleteArticle(ArticleCRUD $articleCRUD, $id)
    {
        // get article
        $article = $articleCRUD->getOneById($id);

        //Delete
        $articleCRUD->delete($article);

        // redirect
        return $this->redirectToRoute('show_all_articles');

    }
}