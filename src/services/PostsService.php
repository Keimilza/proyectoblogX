<?php 

namespace App\services;
use App\DoctrineManager;
use App\models\entities\Post;
use Kint;

class PostsService
{   
    private $doctrine;
    public function __construct(DoctrineManager $doctrine)
    {
        $this->doctrine = $doctrine;
    }
    public function getPosts()
    {
        $repository = $this->doctrine->em->getRepository(Post::class);
        return $repository->findAll();
    }
}