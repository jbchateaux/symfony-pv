<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ProjectPhoto
 *
 * @ORM\Table(name="project_photo")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProjectPhotoRepository")
 * @Vich\Uploadable
 */
class ProjectPhoto
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
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="img", type="string", length=255)
     */
    private $img;

    /**
     * @var File
     *
     * @Vich\UploadableField(mapping="project_photo_img", fileNameProperty="img")
     * @Assert\NotBlank(message="Vous devez uploader une image.")
     * @Assert\Image(
     *     minWidth="1600",
     *     minWidthMessage="Votre photo doit faire minimum 1600px de largeur.",
     *     minHeight="400",
     *     minHeightMessage="Votre photo doit faire minimum 400px de hauteur.",
     *     mimeTypes={"image/jpeg", "image/png", "image/gif"},
     *     mimeTypesMessage="Formats autorisés : .png, .jpeg, .jpg, .gif "
     *     )
     */
    private $imgFile;

    /**
     * @var int
     *
     * @ORM\Column(name="position", type="integer")
     * @Assert\NotBlank(message="Vous devez renseigner une position.")
     * @Gedmo\SortablePosition()
     */
    private $position;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Project",inversedBy="projectPhoto")
     * @ORM\JoinColumn(nullable=true)
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
     * @return ProjectPhoto
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
     * Set img
     *
     * @param string $img
     *
     * @return ProjectPhoto
     */
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Get img
     *
     * @return string
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set position
     *
     * @param integer $position
     *
     * @return ProjectPhoto
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set project
     *
     * @param \AppBundle\Entity\Project $project
     *
     * @return ProjectPhoto
     */
    public function setProject(\AppBundle\Entity\Project $project = null)
    {
        $this->project = $project;

        return $this;
    }

    /**
     * Get project
     *
     * @return \AppBundle\Entity\Project
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * @return File|null
     */
    public function getImgFile()
    {
        return $this->imgFile;
    }

    /**
     * @param File $img
     * @return ProjectPhoto
     * @internal param UploadedFile|File $image
     */
    public function setImgFile(File $img = null)
    {
        $this->imgFile = $img;

        if ($img) {
            $this->updatedAt = new \DateTime('now');
        }
    }
}
