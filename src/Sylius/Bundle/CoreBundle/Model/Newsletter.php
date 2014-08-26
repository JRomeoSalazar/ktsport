<?php

namespace Sylius\Bundle\CoreBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Newsletter
 */
class Newsletter
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string $emisor
     */
    protected $emisor;

    /**
     * @var Collection $destinatarios
     */
    protected $destinatarios;

    /**
     * @var \DateTime $fecha
     */
    protected $fecha;

    /**
     * @var string $mes
     */
    protected $mes;

    /**
     * @var string $titulo
     */
    protected $titulo;

    /**
     * @var string $titulo
     */
    protected $contenido;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->destinatarios = new ArrayCollection();
        $this->fecha = new \DateTime();
        $this->mes = date('n');
    }

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
     * Set the emisor.
     *
     * @param string $emisor
     * @return Newsletter
     */
    public function setEmisor($emisor)
    {
        $this->emisor = $emisor;
    }

    /**
     * Get emisor.
     *
     * @return string
     */
    public function getEmisor()
    {
        return $this->emisor;
    }

    /**
     * Get destinatarios.
     *
     * @return Collection
     */
    public function getDestinatarios()
    {
        return $this->destinatarios;
    }

    /**
     * Comprueba si la newsletter contiene el destinatario.
     *
     * @return Boolean
     */
    public function hasDestinatario(string $destinatario)
    {
        return $this->destinatarios->contains($destinatario);
    }

    /**
     * Añadir destinatario.
     *
     * @param string $destinatario
     */
    public function addDestinatario(string $destinatario)
    {
        if (!$this->hasDestinatario($destinatario)) {
            $this->destinatarios->add($destinatario);
        }
    }

    /**
     * Quitar destinatario.
     *
     * @param string $destinatario
     */
    public function removeDestinatario(string $destinatario)
    {
        $this->destinatarios->removeElement($destinatario);
    }

    /**
     * Set the fecha.
     *
     * @param \DateTime $fecha
     * @return Newsletter
     */
    public function setFecha(\DateTime $fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * Get fecha.
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the mes.
     *
     * @param string $mes
     * @return Newsletter
     */
    public function setMes($mes)
    {
        $this->mes = $mes;
    }

    /**
     * Get mes.
     *
     * @return string
     */
    public function getMes()
    {
        return $this->mes;
    }

    /**
     * Set the titulo.
     *
     * @param string $titulo
     * @return Newsletter
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    /**
     * Get titulo.
     *
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the contenido.
     *
     * @param string $contenido
     * @return Newsletter
     */
    public function setContenido($contenido)
    {
        $this->contenido = $contenido;
    }

    /**
     * Get contenido.
     *
     * @return string
     */
    public function getContenido()
    {
        return $this->contenido;
    }
}
