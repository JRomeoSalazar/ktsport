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
     * @var string $emisor
     */
    protected $nombreEmisor;

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
     * @var Collection
     */
    protected $provinces;

    /**
     * @var boolean
     */
    protected $enviarATodos;

    /**
     * @var Collection
     */
    protected $actividades;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->fecha = new \DateTime();
        $this->mes = date('n');
        $this->provinces = new ArrayCollection();
        $this->actividades = new ArrayCollection();
        $this->enviarATodos = false;
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
     * Set the nombreEmisor.
     *
     * @param string $nombreEmisor
     * @return Newsletter
     */
    public function setNombreEmisor($nombreEmisor)
    {
        $this->nombreEmisor = $nombreEmisor;
    }

    /**
     * Get nombreEmisor.
     *
     * @return string
     */
    public function getNombreEmisor()
    {
        return $this->nombreEmisor;
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

    /**
     * Set provinces.
     *
     * @param Collection $provinces
     * @return Newsletter
     */
    public function setProvinces($provinces)
    {
        $this->provinces = $provinces;
    }

    /**
     * Get provinces.
     *
     * @return Collection
     */
    public function getProvinces()
    {
        return $this->provinces;
    }

    /**
     * Set the enviarATodos.
     *
     * @param boolean $enviarATodos
     * @return Newsletter
     */
    public function setEnviarATodos($enviarATodos)
    {
        $this->enviarATodos = $enviarATodos;
    }

    /**
     * Get enviarATodos.
     *
     * @return boolean
     */
    public function getEnviarATodos()
    {
        return $this->enviarATodos;
    }

    /**
     * Set actividades.
     *
     * @param Collection $actividades
     * @return Newsletter
     */
    public function setActividades($actividades)
    {
        $this->actividades = $actividades;
    }

    /**
     * Get actividades.
     *
     * @return Collection
     */
    public function getActividades()
    {
        return $this->actividades;
    }
}
