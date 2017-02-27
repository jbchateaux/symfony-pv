<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Project;
use Faker\Factory;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadProject extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
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
        $destPath = 'web/uploads/project/';
        $fixturesPath = 'web/uploads/data/dev/project/';
        $this->container->get('wandi_tools.files_manager')->deleteDirectory($destPath);

        $projectFrameworkRepo = $em->getRepository("AppBundle:ProjectFramework");
        $projectRoleRepo = $em->getRepository("AppBundle:ProjectRole");
        $projectDatabaseRepo = $em->getRepository("AppBundle:ProjectDatabase");
        $projectLanguageRepo = $em->getRepository('AppBundle:ProjectLanguage');

        $projectLanguages = $projectLanguageRepo->findAll();
        $projectLanguageCount = count($projectLanguages);

        $projects = array(
            array(
                "title" => "Aquafed",
                "content" => "<p>".$faker->paragraph(mt_rand(4,6))."</p>",
                "contentMore" => "<p>".$faker->paragraph(mt_rand(4,6))."</p>",
                "link" => "http://www.aquafed.org/",
                "img" => "aquafed.jpg",
                "imgPreview" => "aquafed_visual.jpg",
                "imgLogo" => "aquafed-logo-w.png",
                "color" => "#7099cb",
                "isI18n" => true,
                "projectFramework" => $projectFrameworkRepo->findOneById(1),
                "projectRole" => $projectRoleRepo->findOneById(1),
                "projectDatabase" => $projectDatabaseRepo->findOneById(1),
                "projectLanguages" => array(
                    $projectLanguages[0],
                    $projectLanguages[1]
                )
            ),
            array(
                "title" => "La Transition",
                "content" => "<p>".$faker->paragraph(mt_rand(4,6))."</p>",
                "contentMore" => "<p>".$faker->paragraph(mt_rand(4,6))."</p>",
                "link" => "http://la-transition.fr/",
                "img" => "transition.jpg",
                "imgPreview" => "transition_visual.jpg",
                "imgLogo" => "transition-logo-w.png",
                "color" => "#a6003e",
                "isI18n" => false,
                "projectFramework" => $projectFrameworkRepo->findOneById(1),
                "projectRole" => $projectRoleRepo->findOneById(1),
                "projectDatabase" => $projectDatabaseRepo->findOneById(1),
                "projectLanguages" => array(
                    $projectLanguages[0]
                )
            ),
            array(
                "title" => "WWF : Projets",
                "content" => "<p>".$faker->paragraph(mt_rand(4,6))."</p>",
                "contentMore" => "<p>".$faker->paragraph(mt_rand(4,6))."</p>",
                "link" => "http://projets.wwf.fr/",
                "img" => "wwf_projets.jpg",
                "imgPreview" => "wwf_visual.jpg",
                "imgLogo" => "wwf-logo-w.png",
                "color" => "#848484",
                "isI18n" => false,
                "projectFramework" => $projectFrameworkRepo->findOneById(1),
                "projectRole" => $projectRoleRepo->findOneById(1),
                "projectDatabase" => $projectDatabaseRepo->findOneById(1),
                "projectLanguages" => array(
                    $projectLanguages[0]
                )
            ),
            array(
                "title" => "Only Watch",
                "content" => "<p>".$faker->paragraph(mt_rand(4,6))."</p>",
                "contentMore" => "<p>".$faker->paragraph(mt_rand(4,6))."</p>",
                "link" => "http://www.onlywatch.com/",
                "imgPreview" => "onlywatch_visual.jpg",
                "imgLogo" => "onlywatch-logo-w.png",
                "color" => "#ffc300",
                "img" => "ow.jpg",
                "isI18n" => false,
                "projectFramework" => $projectFrameworkRepo->findOneById(1),
                "projectRole" => $projectRoleRepo->findOneById(1),
                "projectDatabase" => $projectDatabaseRepo->findOneById(1),
                "projectLanguages" => array(
                    $projectLanguages[1]
                )
            ),
            array(
                "title" => "Fondation Nicolas Hulot : My positive impact",
                "content" => "<p>".$faker->paragraph(mt_rand(4,6))."</p>",
                "contentMore" => "<p>".$faker->paragraph(mt_rand(4,6))."</p>",
                "link" => "http://www.mypositiveimpact.org/",
                "img" => "fnh.jpg",
                "imgPreview" => "mpi_visual.jpg",
                "imgLogo" => "mpi-logo-w.png",
                "color" => "#8cc18b",
                "isI18n" => false,
                "projectFramework" => $projectFrameworkRepo->findOneById(1),
                "projectRole" => $projectRoleRepo->findOneById(4),
                "projectDatabase" => $projectDatabaseRepo->findOneById(1),
                "projectLanguages" => array(
                    $projectLanguages[0]
                )
            ),
            array(
                "title" => "Momentys",
                "content" => "<p>".$faker->paragraph(mt_rand(4,6))."</p>",
                "contentMore" => "<p>".$faker->paragraph(mt_rand(4,6))."</p>",
                "link" => "http://www.momentys.fr/",
                "img" => "momentys.jpg",
                "isI18n" => false,
                "projectFramework" => $projectFrameworkRepo->findOneById(1),
                "projectRole" => $projectRoleRepo->findOneById(1),
                "projectDatabase" => $projectDatabaseRepo->findOneById(1),
                "projectLanguages" => array(
                    $projectLanguages[0]
                )
            ),
            array(
                "title" => "Melvin & Hamilton : Experience",
                "content" => "<p>".$faker->paragraph(mt_rand(4,6))."</p>",
                "contentMore" => "<p>".$faker->paragraph(mt_rand(4,6))."</p>",
                "link" => "http://www.jenesaispas.fr/",
                "img" => "mh_experience.jpg",
                "isI18n" => true,
                "projectFramework" => $projectFrameworkRepo->findOneById(1),
                "projectRole" => $projectRoleRepo->findOneById(1),
                "projectDatabase" => $projectDatabaseRepo->findOneById(2),
                "projectLanguages" => array(
                    $projectLanguages[0],
                    $projectLanguages[1],
                    $projectLanguages[2],
                    $projectLanguages[3]
                )
            ),
            array(
                "title" => "Batofar",
                "content" => "<p>".$faker->paragraph(mt_rand(4,6))."</p>",
                "contentMore" => "<p>".$faker->paragraph(mt_rand(4,6))."</p>",
                "link" => "http://www.batofar.org/",
                "img" => "batofar.jpg",
                "isI18n" => true,
                "projectFramework" => $projectFrameworkRepo->findOneById(1),
                "projectRole" => $projectRoleRepo->findOneById(3),
                "projectDatabase" => $projectDatabaseRepo->findOneById(1),
                "projectLanguages" => array(
                    $projectLanguages[0],
                    $projectLanguages[1]
                )
            ),
            array(
                "title" => "Maurice Lacroix",
                "content" => "<p>".$faker->paragraph(mt_rand(4,6))."</p>",
                "contentMore" => "<p>".$faker->paragraph(mt_rand(4,6))."</p>",
                "link" => "http://www.mauricelacroix.fr/",
                "img" => "ml.jpg",
                "isI18n" => true,
                "projectFramework" => $projectFrameworkRepo->findOneById(1),
                "projectRole" => $projectRoleRepo->findOneById(3),
                "projectDatabase" => $projectDatabaseRepo->findOneById(1),
                "projectLanguages" => array(
                    $projectLanguages[0],
                    $projectLanguages[1],
                    $projectLanguages[2],
                    $projectLanguages[3],
                    $projectLanguages[4],
                    $projectLanguages[5],
                    $projectLanguages[6]
                )
            )
        );

        if (!is_dir($destPath)) {
            mkdir($destPath, 0777, true);
        }

        for ($i = 0; $i <= count($projects)-1; $i++)
        {
            $project = new Project();
            $project->setTitle($projects[$i]["title"]);
            $project->setContent($projects[$i]["content"]);
            if (mt_rand(1, 3) == 1)
                $project->setContentMore($projects[$i]["contentMore"]);
            $project->setLink($projects[$i]["link"]);
            $project->setImg($tokenGenerator->generate().'.jpg');
            file_put_contents($destPath.$project->getImg(), file_get_contents($fixturesPath.$projects[$i]["img"]));
            $project->setIsI18n($projects[$i]["isI18n"]);
            $project->setProjectFramework($projects[$i]["projectFramework"]);
            $project->setProjectRole($projects[$i]["projectRole"]);
            $project->setProjectDatabase($projects[$i]["projectDatabase"]);
            $project->setPosition($i+1);

            if (isset($projects[$i]["imgPreview"])) {
                $project->setImgPreview($tokenGenerator->generate().'.jpg');
                file_put_contents($destPath.$project->getImgPreview(), file_get_contents($fixturesPath.$projects[$i]["imgPreview"]));
            }

            if (isset($projects[$i]["imgLogo"])) {
                $project->setImgLogo($tokenGenerator->generate().'.png');
                file_put_contents($destPath.$project->getImgLogo(), file_get_contents($fixturesPath.$projects[$i]["imgLogo"]));
            }

            if (isset($projects[$i]["color"])) $project->setColor($projects[$i]["color"]);

            for ($j = 0; $j <= count($projects[$i]["projectLanguages"])-1; $j++)
                $project->addProjectLanguage($projects[$i]["projectLanguages"][$j]);

            $em->persist($project);
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
        return 1;
    }
}

