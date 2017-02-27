<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\ProjectFramework;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadProjectFramework extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;


    public function load(ObjectManager $em)
    {
        $time = time();

        $tokenGenerator = $this->container->get('wandi_tools.token_generator');
        $destPath = 'web/uploads/project_framework/';
        $fixturesPath = 'web/uploads/data/dev/project_framework/';
        $this->container->get('wandi_tools.files_manager')->deleteDirectory($destPath);

        $projectFramworks = array(
            array("title" => "SillySmart", "ico" => "sillysmart.png"),
            array("title" => "Symfony", "ico" => "symfony.png")
        );

        if (!is_dir($destPath)) {
            mkdir($destPath, 0777, true);
        }

        foreach ($projectFramworks as $projectFrameworkData)
        {
            $projectFramework = new ProjectFramework();
            $projectFramework->setTitle($projectFrameworkData["title"]);
            $projectFramework->setIco($tokenGenerator->generate().'.png');
            file_put_contents($destPath.$projectFramework->getIco(), file_get_contents($fixturesPath.$projectFrameworkData["ico"]));

            $em->persist($projectFramework);
        }

        $em->flush();

        echo "  " . (time() - $time) . " seconds\n";
    }

    /**
     * Sets the container.
     *
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }


    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 0;
    }
}

