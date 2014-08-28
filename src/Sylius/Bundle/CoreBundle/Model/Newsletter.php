<?php

namespace Sylius\Bundle\CoreBundle\Model;

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
     * @var array $destinatarios
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
     * Set destinatarios.
     *
     * @param array $destinatarios
     * @return Newsletter
     */
    public function setDestinatarios($destinatarios)
    {
        $this->destinatarios = $destinatarios;
    }

    /**
     * Get destinatarios.
     *
     * @return array
     */
    public function getDestinatarios()
    {
        return $this->destinatarios;
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
