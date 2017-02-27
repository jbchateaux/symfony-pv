<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ProjectFramework
 *
 * @ORM\Table(name="project_framework")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProjectFrameworkRepository")
 * @Vich\Uploadable
 */
class ProjectFramework
{
    use TimestampableEntity;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     * @Assert\NotBlank(message="Vous devez renseigner un titre.")
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="ico", type="string", length=255)
     */
    private $ico;

    /**
     * @var File
     *
     * @Vich\UploadableField(mapping="project_framework_ico", fileNameProperty="ico")
     * @Assert\NotBlank(message="Vous devez uploader un ico.")
     * @Assert\Image(
     *     mimeTypes={"image/jpeg", "image/png", "image/gif"},
     *     mimeTypesMessage="Formats autorisés : .png, .jpeg, .jpg, .gif "
     *     )
     */
    private $icoFile;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Project",mappedBy="projectFramework")
     */
    private $project;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return ProjectFramework
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set ico
     *
     * @param string $ico
     *
     * @return ProjectFramework
     */
    public function setIco($ico)
    {
        $this->ico = $ico;

        return $this;
    }

    /**
     * Get ico
     *
     * @return string
     */
    public function getIco()
    {
        return $this->ico;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->project = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add project
     *
     * @param \AppBundle\Entity\Project $project
     *
     * @return ProjectFramework
     */
    public function addProject(\AppBundle\Entity\Project $project)
    {
        $this->project[] = $project;

        return $this;
    }

    /**
     * Remove project
     *
     * @param \AppBundle\Entity\Project $project
     */
    public function removeProject(\AppBundle\Entity\Project $project)
    {
        $this->project->removeElement($project);
    }

    /**
     * Get project
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProject()
    {
        return $this->project;
    }
    /**
     * @return File|null
     */
    public function getIcoFile()
    {
        return $this->icoFile;
    }

    /**
     * @param File $img
     * @internal param UploadedFile|File $image
     */
    public function setIcoFile(File $img = null)
    {
        $this->icoFile = $img;

        if ($img) {
            $this->updatedAt = new \DateTime('now');
        }
    }
}
