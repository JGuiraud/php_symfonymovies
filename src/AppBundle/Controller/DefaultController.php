<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/test.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }
    /**
     * @Route("/movies", name="movies")
     */
    public function moviesListAction(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:Movie');
      // find *all* todo items
        $movies = $repository->findAll();
        return $this->render('movies/listmovie.html.twig', array(
        'movies' => $movies,
        ));
    }
    /**
     * @Route("/lucky/number")
     */
    public function numberAction()
    {
        $number = mt_rand(0, 100);

        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }

    /**
     * @Route("/test")
     */
    public function testAction(Request $request)
    {
        return new Response(
          '<html><body>Test !!! </body></html>'
        );
    }
}
