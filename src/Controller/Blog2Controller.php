<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class Blog2Controller extends AbstractController
{
    #[Route('/blog2', name: 'app_blog2')]
    public function index(): Response
    {
        return $this->render('blog2/index.html.twig', [
            'controller_name' => 'Blog2Controller',
        ]);
    }

    #[Route(path: '/file')]
    public function fileTest()
    {
        return $this->file('test.txt');
    }

    #[Route(path: '/titre')]
    public function titre()
    {
        return $this->render('base.html.twig');
    }

    #[Route(path: '/url/{title}', name: 'url')]
    public function url()
    {
        $url =  $this->generateUrl('url', ['title' => 'john'], UrlGeneratorInterface::ABSOLUTE_URL);
        dd($url);
    }

    #[Route(path: '/google')]
    public function google()
    {
        return $this->redirect('https://www.google.fr');
    }

    #[Route(path: '/redirectRoute')]
    public function redirectRoute()
    {
        return $this->redirectToRoute('homepage');
    }

    #[Route(path: '/article')]
    public function article()
    {
        throw $this->createNotFoundException('Article non trouvé');
    }

    #[Route(path: '/test_twig')]
    public function testTwig() {
        $user = [
            'name' => 'Jean',
            'email' => 'jean@gmail.com'
        ];

        $product = [
            'name' => 'voiture Tesla',
            'price' => 40000,
            'lastUpdate' => strtotime('yesterday')
        ];

        return $this->render('test.html.twig', ['product' => $product, 'h1' => '<h1>hello</h1>', 'user' => $user]);
    }

}
