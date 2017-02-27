<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Social;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadSocial extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;


    public function load(ObjectManager $em)
    {
        $time = time();
        $count = 1;

        $socials = array(
            array("title" => "Facebook", "link" => "https://www.facebook.com/jb.chateaux", "ico" => "facebook"),
            array("title" => "LinkedIn", "link" => "https://fr.linkedin.com/in/jean-baptiste-chateaux-57377a20", "ico" => "linkedin"),
            array("title" => "Instagram", "link" => "https://www.instagram.com/jibcode/", "ico" => "instagram")
        );

        foreach ($socials as $socialData)
        {
            $social = new Social();
            $social->setTitle($socialData["title"]);
            $social->setLink($socialData["link"]);
            $social->setIcoFontAwesome($socialData["ico"]);
            $social->setPosition($count);

            $em->persist($social);

            $count++;
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

