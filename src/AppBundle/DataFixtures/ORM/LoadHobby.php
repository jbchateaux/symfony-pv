<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\HobbyPhoto;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Hobby;
use Faker\Factory;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadHobby extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;


    public function load(ObjectManager $em)
    {
        $faker = Factory::create();
        $time = time();

        $tokenGenerator = $this->container->get('wandi_tools.token_generator');
        $destPath = 'web/uploads/hobby/';
        $fixturesPath = 'web/uploads/data/dev/hobby/';
        $this->container->get('wandi_tools.files_manager')->deleteDirectory($destPath);

        $hobbies = array(
            array(
                "title" => "Course automobile",
                "content" => "<p>".$faker->paragraph(mt_rand(4,6))."</p>",
                "ico" => "race.png"
            ),
            array(
                "title" => "Voyages",
                "content" => "<p>".$faker->paragraph(mt_rand(4,6))."</p>",
                "ico" => "trip.png"
            ),
            array(
                "title" => "Natation",
                "content" => "<p>".$faker->paragraph(mt_rand(4,6))."</p>",
                "ico" => "swim.png"
            ),
            array(
                "title" => "Musique",
                "content" => "<p>".$faker->paragraph(mt_rand(4,6))."</p>",
                "ico" => "music.png"
            ),
            array(
                "title" => "Jeux vidéos",
                "content" => "<p>".$faker->paragraph(mt_rand(4,6))."</p>",
                "ico" => "games.png"
            )
        );

        if (!is_dir($destPath)) {
            mkdir($destPath, 0777, true);
        }

        foreach ($hobbies as $hobbyData)
        {
            $hobby = new Hobby();
            $hobby->setTitle($hobbyData["title"]);
            $hobby->setContent($hobbyData["content"]);
            $hobby->setIco($tokenGenerator->generate().'.png');
            file_put_contents($destPath.$hobby->getIco(), file_get_contents($fixturesPath.$hobbyData["ico"]));

            $em->persist($hobby);
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

