<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\ProjectLanguage;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadProjectLanguage extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;


    public function load(ObjectManager $em)
    {
        $time = time();

        $projectLanguages = array(
            array("title" => "Français"),
            array("title" => "Anglais"),
            array("title" => "Allemand"),
            array("title" => "Néerlandais"),
            array("title" => "Chinois"),
            array("title" => "Japonais"),
            array("title" => "Espagnol"),
            array("title" => "Russe")
        );

        foreach ($projectLanguages as $projectLanguageData)
        {
            $projectLanguage = new ProjectLanguage();
            $projectLanguage->setTitle($projectLanguageData["title"]);

            $em->persist($projectLanguage);
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

