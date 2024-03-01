<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class DefaultController extends AbstractController
{

    public function index(Request $request)
    {

        dump($request);

        $response = new Response('<h1>Hello world !</h1>');
        return $response;
    }

    #[Route(
        path: '/blog/{name}',
        name: 'blog',
        methods: ['GET'],
        schemes: ['HTTPS'],
        defaults: ['name' => 'Lala'],
        requirements: ['name' => '[a-zA-Z]+']
    )]
    public function blog(Request $request, $name)
    {
        // $title = $request->attributes->get('name');
        dd($name);
        return new Response('Blog');
    }

    #[Route(path: '/blog/homepage', name: 'homepage', methods: ['GET'], priority: 1)]
    public function blogHomepage()
    {
        return new Response('Blog Homepage');
    }

    #[Route(path: '/about/list', name: 'about')]
    public function aboutList()
    {
        return $this->render('base.html.twig');
    }

    public function test2()
    {
        $blogPost = [
            'title' => 'Je suis le dernier article de blog ah ah'
        ];

        return $this->render('test2.html.twig', ['blogPost' => $blogPost]);
    }
}
