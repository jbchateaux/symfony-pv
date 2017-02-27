<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * HobbyPhoto
 *
 * @ORM\Table(name="hobby_photo")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\HobbyPhotoRepository")
 * @Vich\Uploadable
 */
class HobbyPhoto
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
     * @Vich\UploadableField(mapping="hobby_photo_img", fileNameProperty="img")
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Hobby",inversedBy="hobbyPhoto")
     * @ORM\JoinColumn(nullable=true)
     */
    private $hobby;


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
     * @return HobbyPhoto
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
     * @return HobbyPhoto
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
     * @return HobbyPhoto
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
    public function getImgFile()
    {
        return $this->imgFile;
    }

    /**
     * @param File $img
     * @return HobbyPhoto
     * @internal param UploadedFile|File $image
     */
    public function setImgFile(File $img = null)
    {
        $this->imgFile = $img;

        if ($img) {
            $this->updatedAt = new \DateTime('now');
        }
    }

    /**
     * Set hobby
     *
     * @param \AppBundle\Entity\Hobby $hobby
     *
     * @return HobbyPhoto
     */
    public function setHobby(\AppBundle\Entity\Hobby $hobby = null)
    {
        $this->hobby = $hobby;

        return $this;
    }

    /**
     * Get hobby
     *
     * @return \AppBundle\Entity\Hobby
     */
    public function getHobby()
    {
        return $this->hobby;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getTitle();
    }
}
