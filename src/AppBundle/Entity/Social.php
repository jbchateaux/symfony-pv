<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Social
 *
 * @ORM\Table(name="social")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SocialRepository")
 */
class Social
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
     * @ORM\Column(name="link", type="string", length=255)
     * @Assert\NotBlank(message="Vous devez renseigner un lien.")
     */
    private $link;

    /**
     * @var string
     *
     * @ORM\Column(name="ico_font_awesome", type="string", length=255)
     */
    private $icoFontAwesome;

    /**
     * @var int
     *
     * @ORM\Column(name="position", type="integer")
     * @Assert\NotBlank(message="Vous devez renseigner une position.")
     * @Gedmo\SortablePosition()
     */
    private $position;


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
     * @return Social
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
     * Set link
     *
     * @param string $link
     *
     * @return Social
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
     * Set position
     *
     * @param integer $position
     *
     * @return Social
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
     * Set icoFontAwesome
     *
     * @param string $icoFontAwesome
     *
     * @return Social
     */
    public function setIcoFontAwesome($icoFontAwesome)
    {
        $this->icoFontAwesome = $icoFontAwesome;

        return $this;
    }

    /**
     * Get icoFontAwesome
     *
     * @return string
     */
    public function getIcoFontAwesome()
    {
        return $this->icoFontAwesome;
    }
}
