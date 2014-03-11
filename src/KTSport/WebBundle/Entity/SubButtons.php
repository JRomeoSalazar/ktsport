<?php

namespace KTSport\WebBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Translatable\Translatable;

/**
 * SubButtons
 *
 * @ORM\Table(name="ktsport_subbuttons")
 * @ORM\Entity(repositoryClass="KTSport\WebBundle\Entity\SubButtonsRepository")
 */
class SubButtons
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
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

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
     * @ORM\Column(name="pdf", type="string", length=255, nullable=true)
     */
    private $pdf;

    /**
     * @Gedmo\Locale
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
     * @return SubButtons
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
     * Set url
     *
     * @param string $url
     * @return SubButtons
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
     * Set content
     *
     * @param string $content
     * @return SubButtons
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
     * Set pdf
     *
     * @param string $pdf
     * @return SubButtons
     */
    public function setPdf($pdf)
    {
        $this->pdf = $pdf;
    
        return $this;
    }

    /**
     * Get pdf
     *
     * @return string 
     */
    public function getPdf()
    {
        return $this->pdf;
    }

    /*
     * Set Translatable Locale
     */
    public function setTranslatableLocale($locale)
    {
        $this->locale = $locale;
    }

    /**
     * @ORM\ManyToOne(targetEntity="Buttons", inversedBy="subbuttons")
     * @ORM\JoinColumn(name="button_id", referencedColumnName="id")
     * @return integer
     */
    private $button;
    public function setButton(Buttons $button)
    {
        $this->button = $button;
    }

    public function getButton()
    {
        return $this->button;
    }
}
