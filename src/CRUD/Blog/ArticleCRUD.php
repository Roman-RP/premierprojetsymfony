<?php

namespace App\CRUD\Blog;

use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;

class ArticleCRUD
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var \App\Repository\Blog\ArticleRepository|\Doctrine\Common\Persistence\ObjectRepository
     */
    private $repo;

    /**
     * ArticleCRUD constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {

        $this->em = $em;
        $this->repo = $em->getRepository('App:Article');
    }

    private function persist(Article $article)
    {
        $this->em->persist($article);
        $this->em->flush();
    }

    /**
     * @param Article $article
     */
    public function add(Article $article): void
    {
        $this->persist($article);
    }

    /**
     * @param Article $article
     */
    public function update(Article $article): void
    {
        $this->persist($article);
    }

    /**
     * @param int $id
     * @return Article
     */
    public function getOneById(int $id): Article
    {
        return $this->repo->find($id);
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        return $this->repo->findAll();
    }

    /**
     * @param Article $article
     */
    public function delete(Article $article): void
    {
        $this->em->remove($article);
        $this->em->flush();
    }
}