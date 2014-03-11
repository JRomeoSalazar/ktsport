<?php

namespace KTSport\WebBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Translatable\Translatable;

/**
 * Buttons
 *
 * @ORM\Table(name="ktsport_buttons")
 * @ORM\Entity(repositoryClass="KTSport\WebBundle\Entity\ButtonsRepository")
 */
class Buttons
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @Gedmo\Translatable
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @Gedmo\Translatable
     * @ORM\Column(name="content", type="text", nullable=true)
     */
    private $content;

    /**
     * @var string
     *
     * @Gedmo\Translatable
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @Gedmo\Locale
     * 
     * 
     */
    private $locale;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Buttons
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
     * @return Buttons
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
     * Set url
     *
     * @param string $url
     * @return Buttons
     */
    public function setUrl($url)
    {
        $this->url = $url;
    
        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return SubButtons
     */
    public function setImage($image)
    {
        $this->image = $image;
    
        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @ORM\ManyToOne(targetEntity="Bars", inversedBy="buttons")
     * @ORM\JoinColumn(name="bar_id", referencedColumnName="id")
     * @return integer
     */
    private $bar;
    public function setBar(Bars $bar)
    {
        $this->bar = $bar;
    }

    public function getBar()
    {
        return $this->bar;
    }


    /**
     * @ORM\OneToMany(targetEntity="SubButtons", mappedBy="button")
     */
    private $subbuttons;
    public function __construct()
    {
        $this->subbuttons = new ArrayCollection();
    }
    public function addSubButtons(SubButtons $subbuttons)
    {
        $this->subbuttons[] = $subbuttons;
    }

    public function getSubButtons()
    {
        return $this->subbuttons;
    }

    /* Este es el valor que se le pasará cuando se le invoque en la creación de comentarios por ejemplo */
    public function __toString()
    {
        // Se pueden concatenar valores:
        // return $this->getTitle() . ‘ ‘ . $this->getAuthor();
        return $this->getTitle();

    }

    /*
     * Set Translatable Locale
     */
    public function setTranslatableLocale($locale)
    {
        $this->locale = $locale;
    }
}
