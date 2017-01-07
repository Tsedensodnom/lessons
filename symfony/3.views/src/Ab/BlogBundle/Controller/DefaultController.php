<?php

namespace Ab\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BlogBundle:Default:index.html.twig');
    }
    
    public function postsAction() {
        return $this->render('BlogBundle:Default:posts.html.twig');
    }
    
    public function pagesAction() {
        return $this->render('BlogBundle:Default:pages.html.twig');
    }
}
