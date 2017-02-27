<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Project
 *
 * @ORM\Table(name="project")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProjectRepository")
 * @Vich\Uploadable
 */
class Project
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
     * @Gedmo\Slug(fields={"title"})
     * @ORM\Column(name="slug", type="string", length=255, unique=true)
     */
    private $slug;

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
     * @ORM\Column(name="content_more", type="text", nullable=true)
     */
    private $contentMore;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=255)
     * @Assert\NotBlank(message="Vous devez renseigner un lien.")
     */
    private $link;

    /**
     * @var string
     *
     * @ORM\Column(name="img", type="string", length=255)
     */
    private $img;

    /**
     * @var File
     *
     * @Vich\UploadableField(mapping="project_img", fileNameProperty="img")
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
     * @var string
     *
     * @ORM\Column(name="img_preview", type="string", nullable=true, length=255)
     */
    private $imgPreview;

    /**
     * @var File
     *
     * @Vich\UploadableField(mapping="project_img", fileNameProperty="imgPreview")
     * @Assert\Image(
     *     minWidth="1600",
     *     minWidthMessage="Votre photo doit faire minimum 1600px de largeur.",
     *     minHeight="400",
     *     minHeightMessage="Votre photo doit faire minimum 400px de hauteur.",
     *     mimeTypes={"image/jpeg", "image/png", "image/gif"},
     *     mimeTypesMessage="Formats autorisés : .png, .jpeg, .jpg, .gif "
     *     )
     */
    private $imgPreviewFile;

    /**
     * @var string
     *
     * @ORM\Column(name="img_logo", type="string", nullable=true, length=255)
     */
    private $imgLogo;

    /**
     * @var File
     *
     * @Vich\UploadableField(mapping="project_img", fileNameProperty="imgLogo")
     * @Assert\Image(
     *     minWidth="1600",
     *     minWidthMessage="Votre photo doit faire minimum 1600px de largeur.",
     *     minHeight="400",
     *     minHeightMessage="Votre photo doit faire minimum 400px de hauteur.",
     *     mimeTypes={"image/jpeg", "image/png", "image/gif"},
     *     mimeTypesMessage="Formats autorisés : .png, .jpeg, .jpg, .gif "
     *     )
     */
    private $imgLogoFile;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=8, nullable=true)
     * @Assert\NotBlank(message="Vous devez renseigner une couleur")
     */
    private $color;

    /**
     * @var boolean
     * @ORM\Column(name="isI18n", type="boolean", nullable=false, options={"default":false})
     */
    private $isI18n;

    /**
     * @var int
     *
     * @ORM\Column(name="position", type="integer")
     * @Assert\NotBlank(message="Vous devez renseigner une position.")
     * @Gedmo\SortablePosition()
     */
    private $position;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ProjectPhoto",mappedBy="project")
     */
    private $projectPhoto;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ProjectFramework",inversedBy="project")
     * @ORM\JoinColumn(nullable=true)
     */
    private $projectFramework;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ProjectRole",inversedBy="project")
     * @ORM\JoinColumn(nullable=true)
     */
    private $projectRole;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ProjectDatabase",inversedBy="project")
     * @ORM\JoinColumn(nullable=true)
     */
    private $projectDatabase;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\ProjectLanguage", cascade={"persist"}, inversedBy="projects")
     * @ORM\JoinTable(name="project_language_bearer")
     */
    private $projectLanguages;


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
     * @return Project
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
     * @return Project
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
     * Set img
     *
     * @param string $img
     *
     * @return Project
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
     * Set framework
     *
     * @param string $framework
     *
     * @return Project
     */
    public function setFramework($framework)
    {
        $this->framework = $framework;

        return $this;
    }

    /**
     * Get framework
     *
     * @return string
     */
    public function getFramework()
    {
        return $this->framework;
    }

    /**
     * Set agency
     *
     * @param string $agency
     *
     * @return Project
     */
    public function setAgency($agency)
    {
        $this->agency = $agency;

        return $this;
    }

    /**
     * Get agency
     *
     * @return string
     */
    public function getAgency()
    {
        return $this->agency;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->projectPhoto = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add projectPhoto
     *
     * @param \AppBundle\Entity\ProjectPhoto $projectPhoto
     *
     * @return Project
     */
    public function addProjectPhoto(\AppBundle\Entity\ProjectPhoto $projectPhoto)
    {
        $this->projectPhoto[] = $projectPhoto;

        return $this;
    }

    /**
     * Remove projectPhoto
     *
     * @param \AppBundle\Entity\ProjectPhoto $projectPhoto
     */
    public function removeProjectPhoto(\AppBundle\Entity\ProjectPhoto $projectPhoto)
    {
        $this->projectPhoto->removeElement($projectPhoto);
    }

    /**
     * Get projectPhoto
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProjectPhoto()
    {
        return $this->projectPhoto;
    }

    /**
     * Set projectFramework
     *
     * @param \AppBundle\Entity\ProjectFramework $projectFramework
     *
     * @return Project
     */
    public function setProjectFramework(\AppBundle\Entity\ProjectFramework $projectFramework = null)
    {
        $this->projectFramework = $projectFramework;

        return $this;
    }

    /**
     * Get projectFramework
     *
     * @return \AppBundle\Entity\ProjectFramework
     */
    public function getProjectFramework()
    {
        return $this->projectFramework;
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
     * @return Project
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
     * Set slug
     *
     * @param string $slug
     *
     * @return Project
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set projectRole
     *
     * @param \AppBundle\Entity\ProjectRole $projectRole
     *
     * @return Project
     */
    public function setProjectRole(\AppBundle\Entity\ProjectRole $projectRole = null)
    {
        $this->projectRole = $projectRole;

        return $this;
    }

    /**
     * Get projectRole
     *
     * @return \AppBundle\Entity\ProjectRole
     */
    public function getProjectRole()
    {
        return $this->projectRole;
    }

    /**
     * Set contentMore
     *
     * @param string $contentMore
     *
     * @return Project
     */
    public function setContentMore($contentMore)
    {
        $this->contentMore = $contentMore;

        return $this;
    }

    /**
     * Get contentMore
     *
     * @return string
     */
    public function getContentMore()
    {
        return $this->contentMore;
    }

    /**
     * Set link
     *
     * @param string $link
     *
     * @return Project
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set projectDatabase
     *
     * @param \AppBundle\Entity\ProjectDatabase $projectDatabase
     *
     * @return Project
     */
    public function setProjectDatabase(\AppBundle\Entity\ProjectDatabase $projectDatabase = null)
    {
        $this->projectDatabase = $projectDatabase;

        return $this;
    }

    /**
     * Get projectDatabase
     *
     * @return \AppBundle\Entity\ProjectDatabase
     */
    public function getProjectDatabase()
    {
        return $this->projectDatabase;
    }

    /**
     * Set isI18n
     *
     * @param boolean $isI18n
     *
     * @return Project
     */
    public function setIsI18n($isI18n)
    {
        $this->isI18n = $isI18n;

        return $this;
    }

    /**
     * Get isI18n
     *
     * @return boolean
     */
    public function getIsI18n()
    {
        return $this->isI18n;
    }

    /**
     * Add projectLanguage
     *
     * @param \AppBundle\Entity\ProjectLanguage $projectLanguage
     *
     * @return Project
     */
    public function addProjectLanguage(\AppBundle\Entity\ProjectLanguage $projectLanguage)
    {
        $this->projectLanguages[] = $projectLanguage;

        return $this;
    }

    /**
     * Remove projectLanguage
     *
     * @param \AppBundle\Entity\ProjectLanguage $projectLanguage
     */
    public function removeProjectLanguage(\AppBundle\Entity\ProjectLanguage $projectLanguage)
    {
        $this->projectLanguages->removeElement($projectLanguage);
    }

    /**
     * Get projectLanguages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProjectLanguages()
    {
        return $this->projectLanguages;
    }

    /**
     * Set position
     *
     * @param integer $position
     *
     * @return Project
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set imgPreview
     *
     * @param string $imgPreview
     *
     * @return Project
     */
    public function setImgPreview($imgPreview)
    {
        $this->imgPreview = $imgPreview;

        return $this;
    }

    /**
     * Get imgPreview
     *
     * @return string
     */
    public function getImgPreview()
    {
        return $this->imgPreview;
    }

    /**
     * @return File|null
     */
    public function getImgPreviewFile()
    {
        return $this->imgPreviewFile;
    }

    /**
     * @param File $img
     * @return Project
     * @internal param UploadedFile|File $image
     */
    public function setImgPreviewFile(File $img = null)
    {
        $this->imgPreviewFile = $img;

        if ($img) {
            $this->updatedAt = new \DateTime('now');
        }
    }

    /**
     * Set color
     *
     * @param string $color
     *
     * @return Project
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set imgLogo
     *
     * @param string $imgLogo
     *
     * @return Project
     */
    public function setImgLogo($imgLogo)
    {
        $this->imgLogo = $imgLogo;

        return $this;
    }

    /**
     * Get imgLogo
     *
     * @return string
     */
    public function getImgLogo()
    {
        return $this->imgLogo;
    }

    /**
     * @return File|null
     */
    public function getImgLogoFile()
    {
        return $this->imgLogoFile;
    }

    /**
     * @param File $img
     * @return Project
     * @internal param UploadedFile|File $image
     */
    public function setImgLogoFile(File $img = null)
    {
        $this->imgLogoFile = $img;

        if ($img) {
            $this->updatedAt = new \DateTime('now');
        }
    }
}
