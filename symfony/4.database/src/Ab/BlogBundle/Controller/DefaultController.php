<?php

namespace Ab\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\Tools\Pagination\Paginator;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $categoryRepository = $this->getDoctrine()->getRepository('BlogBundle:Category');
        $postRepository = $this->getDoctrine()->getRepository('BlogBundle:Post');
        
        $categories = $categoryRepository->createQueryBuilder('c')
            ->orderBy('c.name', 'ASC')
            ->getQuery()
            ->getResult();
            
        $posts = $postRepository->createQueryBuilder('p')
            ->orderBy('p.id', 'DESC')
            ->getQuery()
            ->getResult();
        
        return $this->render('BlogBundle:Default:posts.html.twig', [
            'categories' => $categories,
            'posts' => $posts,
        ]);
    }
}
