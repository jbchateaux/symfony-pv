<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\ProjectDatabase;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadProjectDatabase extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;


    public function load(ObjectManager $em)
    {
        $time = time();

        $projectDatabases = array(
            array("title" => "MySQL"),
            array("title" => "Solr"),
            array("title" => "MariaDB")
        );

        foreach ($projectDatabases as $projectDatabaseData)
        {
            $projectDatabase = new ProjectDatabase();
            $projectDatabase->setTitle($projectDatabaseData["title"]);

            $em->persist($projectDatabase);
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

