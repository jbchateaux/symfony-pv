<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Hobby
 *
 * @ORM\Table(name="hobby")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\HobbyRepository")
 * @Vich\Uploadable
 */
class Hobby
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
     * @ORM\Column(name="content", type="text")
     * @Assert\NotBlank(message="Vous devez renseigner un contenu.")
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\Column(name="ico", type="string", length=255)
     */
    private $ico;

    /**
     * @var File
     *
     * @Vich\UploadableField(mapping="hobby_ico", fileNameProperty="ico")
     * @Assert\NotBlank(message="Vous devez uploader un ico.")
     * @Assert\Image(
     *     mimeTypes={"image/jpeg", "image/png", "image/gif"},
     *     mimeTypesMessage="Formats autorisés : .png, .jpeg, .jpg, .gif "
     *     )
     */
    private $icoFile;

    /**
     * @var int
     *
     * @ORM\Column(name="position", type="integer")
     * @Assert\NotBlank(message="Vous devez renseigner une position.")
     * @Gedmo\SortablePosition()
     */
    private $position;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\HobbyPhoto",mappedBy="hobby")
     */
    private $hobbyPhoto;


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
     * @return Hobby
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
     * Set content
     *
     * @param string $content
     *
     * @return Hobby
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set ico
     *
     * @param string $ico
     *
     * @return Hobby
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
     * Set position
     *
     * @param integer $position
     *
     * @return Hobby
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
     * @return File|null
     */
    public function getIcoFile()
    {
        return $this->icoFile;
    }

    /**
     * @param File $img
     * @return Hobby
     * @internal param UploadedFile|File $image
     */
    public function setIcoFile(File $img = null)
    {
        $this->icoFile = $img;

        if ($img) {
            $this->updatedAt = new \DateTime('now');
        }
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->hobbyPhoto = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add hobbyPhoto
     *
     * @param \AppBundle\Entity\HobbyPhoto $hobbyPhoto
     *
     * @return Hobby
     */
    public function addHobbyPhoto(\AppBundle\Entity\HobbyPhoto $hobbyPhoto)
    {
        $this->hobbyPhoto[] = $hobbyPhoto;

        return $this;
    }

    /**
     * Remove hobbyPhoto
     *
     * @param \AppBundle\Entity\HobbyPhoto $hobbyPhoto
     */
    public function removeHobbyPhoto(\AppBundle\Entity\HobbyPhoto $hobbyPhoto)
    {
        $this->hobbyPhoto->removeElement($hobbyPhoto);
    }

    /**
     * Get hobbyPhoto
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getHobbyPhoto()
    {
        return $this->hobbyPhoto;
    }


}
