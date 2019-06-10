<?php 

namespace App\services;
use App\DoctrineManager;
use App\models\entities\Post;
use Kint;

class PostsService
{   
    private $repository;
    public function __construct(DoctrineManager $doctrine)
    {
        $this->repository = $doctrine->em->getRepository(Post::class);;
    }
    public function getPosts()
    {
        return $this->repository->findAll();
    }
    public function getPostsByIdUser(int $id)
    {
        return $this->repository->findByIdUser($id);
    }
}