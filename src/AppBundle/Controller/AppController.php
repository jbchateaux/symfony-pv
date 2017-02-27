<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AppController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        return $this->render('AppBundle::index.html.twig', [
            "hobbies" => $em->getRepository("AppBundle:Hobby")->findBy(array(), array("position" => "asc")),
            "projects" => $em->getRepository("AppBundle:Project")->findWithLimits(5)
        ]);
    }

    /**
     * @Route("/a-propos", name="about")
     */
    public function aboutAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('AppBundle::about.html.twig', [

        ]);
    }

    /**
     * @Route("/projets", name="projects")
     */
    public function projectsAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('AppBundle::projects.html.twig', [

        ]);
    }

    /**
     * @Route("/projet/{slug}", name="project")
     */
    public function projectAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('AppBundle::project.html.twig', [

        ]);
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contactAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('AppBundle::contact.html.twig', [

        ]);
    }

   public function socialAction()
   {
       $em = $this->getDoctrine()->getManager();

       return $this->render('AppBundle:Components:social.html.twig', [
           "socials" => $em->getRepository('AppBundle:Social')->findBy(array(), array("position" => "asc"))
       ]);
   }
}
