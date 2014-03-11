<?php

namespace KTSport\WebBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Bars
 *
 * @ORM\Table(name="ktsport_bars")
 * @ORM\Entity(repositoryClass="KTSport\WebBundle\Entity\BarsRepository")
 */
class Bars
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var integer
     *
     * @ORM\Column(name="level", type="integer")
     */
    private $level;

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
     * @return Bars
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
     * Set level
     *
     * @param integer $level
     * @return Bars
     */
    public function setLevel($level)
    {
        $this->level = $level;
    
        return $this;
    }

    /**
     * Get level
     *
     * @return integer 
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @ORM\OneToMany(targetEntity="Buttons", mappedBy="bar")
     */
    private $buttons;
    public function __construct()
    {
        $this->buttons = new ArrayCollection();
    }
    public function addButtons(Buttons $buttons)
    {
        $this->buttons[] = $buttons;
    }

    public function getButtons()
    {
        return $this->buttons;
    }

    /* Este es el valor que se le pasará cuando se le invoque en la creación de comentarios por ejemplo */
    public function __toString()
    {
        // Se pueden concatenar valores:
        // return $this->getTitle() . ‘ ‘ . $this->getAuthor();
        return $this->getTitle();

    }
}
