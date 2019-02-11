<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Datos
 *
 * @ORM\Table(name="datos")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DatosRepository")
 */
class Datos
{
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
     * @Assert\NotBlank
     * @ORM\Column(name="nombre", type="string", length=25)
     */
    private $nombre;

    /**
     * @var string
     *
     * @Assert\NotBlank
     * @ORM\Column(name="apellido1", type="string", length=25)
     */
    private $apellido1;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido2", type="string", length=25, nullable=true)
     */
    private $apellido2;

    /**
     * @var \DateTime
     *
     * @Assert\NotBlank
     * @ORM\Column(name="fecha_nacimiento", type="datetime")
     */
    private $fechaNacimiento;

    /**
     * @var string
     *
     * @Assert\NotBlank
     * @ORM\Column(name="lugar_nacimiento", type="string", length=50)
     */
    private $lugarNacimiento;

    /**
     * @var string
     *
     * @Assert\NotBlank
     * @ORM\Column(name="dni", type="string", length=9, unique=true)
     */
    private $dni;

    /**
     * @var string
     *
     * @ORM\Column(name="sip", type="string", length=25, nullable=true)
     */
    private $sip;

    /**
     * @var string
     *
     * @Assert\NotBlank
     * @ORM\Column(name="direccion", type="string", length=50)
     */
    private $direccion;

    /**
     * @var int
     *
     * @Assert\NotBlank
     * @ORM\Column(name="cp", type="integer")
     */
    private $cp;

    /**
     * @var string
     *
     * @Assert\NotBlank
     * @ORM\Column(name="poblaciom", type="string", length=50)
     */
    private $poblacion;

    /**
     * @var string
     *
     * @ORM\Column(name="id_tutor", type="integer", nullable=true)
     */
    private $id_tutor;

    /**
     * @var string
     * 
     * @ORM\Column(name="email", type="string", length=50)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="integer", nullable=true)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="categoria", type="integer", nullable=true)
     */
    private $categoria;

    /**
     * @var string
     *
     * @ORM\Column(name="club", type="string", length=50)
     */
    private $club;

    /**
     * @var string
     *
     * @ORM\Column(name="equipo", type="string", length=25, nullable=true)
     */
    private $equipo;

    /**
     * @var string
     *
     * @ORM\Column(name="loteria", type="boolean")
     */
    private $loteria;

    /**
     * @var string
     *
     * @ORM\Column(name="titular", type="string", length=50, nullable=true)
     */
    private $titular;

    /**
     * @var string
     *
     * @ORM\Column(name="dni_titular", type="string", length=50, nullable=true)
     */
    private $dni_titular;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion_titular", type="string", length=50, nullable=true)
     */
    private $direccion_titular;

    /**
     * @var string
     *
     * @ORM\Column(name="cp_titular", type="string", length=50, nullable=true)
     */
    private $cp_titular;

    /**
     * @var string
     *
     * @ORM\Column(name="poblacion_titular", type="string", length=50, nullable=true)
     */
    private $poblacion_titular;

    /**
     * @var string
     *
     * @ORM\Column(name="iban", type="string", length=50, nullable=true)
     */
    private $iban;

    /**
     * @var string
     *
     * @ORM\Column(name="jugador", type="boolean")
     */
    private $jugador;

    /**
     * @var string
     *
     * @ORM\Column(name="entrenador", type="boolean")
     */
    private $entrenador;

    /**
     * @var string
     *
     * @ORM\Column(name="tutor", type="boolean")
     */
    private $tutor;

    /**
     * @var string
     *
     * @ORM\Column(name="documentos", type="json_array")
     */
    private $documentos;

    /**
     * @var string
     *
     * @ORM\Column(name="confirmado", type="boolean")
     */
    private $confirmado;


    public function __construct()
    {
        $this->club = 'Logos Basket Sedaví';
    }

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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Datos
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apellido1
     *
     * @param string $apellido1
     *
     * @return Datos
     */
    public function setApellido1($apellido1)
    {
        $this->apellido1 = $apellido1;

        return $this;
    }

    /**
     * Get apellido1
     *
     * @return string
     */
    public function getApellido1()
    {
        return $this->apellido1;
    }

    /**
     * Set apellido2
     *
     * @param string $apellido2
     *
     * @return Datos
     */
    public function setApellido2($apellido2)
    {
        $this->apellido2 = $apellido2;

        return $this;
    }

    /**
     * Get apellido2
     *
     * @return string
     */
    public function getApellido2()
    {
        return $this->apellido2;
    }

    /**
     * Set fechaNacimiento
     *
     * @param \DateTime $fechaNacimiento
     *
     * @return Datos
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;

        return $this;
    }

    /**
     * Get fechaNacimiento
     *
     * @return \DateTime
     */
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    /**
     * Set lugarNacimiento
     *
     * @param string $lugarNacimiento
     *
     * @return Datos
     */
    public function setLugarNacimiento($lugarNacimiento)
    {
        $this->lugarNacimiento = $lugarNacimiento;

        return $this;
    }

    /**
     * Get lugarNacimiento
     *
     * @return string
     */
    public function getLugarNacimiento()
    {
        return $this->lugarNacimiento;
    }

    /**
     * Set dni
     *
     * @param string $dni
     *
     * @return Datos
     */
    public function setDni($dni)
    {
        $this->dni = $dni;

        return $this;
    }

    /**
     * Get dni
     *
     * @return string
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Set sip
     *
     * @param string $sip
     *
     * @return Datos
     */
    public function setSip($sip)
    {
        $this->sip = $sip;

        return $this;
    }

    /**
     * Get sip
     *
     * @return string
     */
    public function getSip()
    {
        return $this->sip;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     *
     * @return Datos
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set cp
     *
     * @param integer $cp
     *
     * @return Datos
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return int
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set poblacion
     *
     * @param string $poblacion
     *
     * @return Datos
     */
    public function setPoblacion($poblacion)
    {
        $this->poblacion = $poblacion;

        return $this;
    }

    /**
     * Get poblacion
     *
     * @return string
     */
    public function getPoblacion()
    {
        return $this->poblacion;
    }

    /**
     * Set idTutor
     *
     * @param integer $idTutor
     *
     * @return Datos
     */
    public function setIdTutor($idTutor)
    {
        $this->id_tutor = $idTutor;

        return $this;
    }

    /**
     * Get idTutor
     *
     * @return integer
     */
    public function getIdTutor()
    {
        return $this->id_tutor;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Datos
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set telefono
     *
     * @param integer $telefono
     *
     * @return Datos
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return integer
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set categoria
     *
     * @param integer $categoria
     *
     * @return Datos
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get categoria
     *
     * @return integer
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set club
     *
     * @param string $club
     *
     * @return Datos
     */
    public function setClub($club)
    {
        $this->club = $club;

        return $this;
    }

    /**
     * Get club
     *
     * @return string
     */
    public function getClub()
    {
        return $this->club;
    }

    /**
     * Set equipo
     *
     * @param string $equipo
     *
     * @return Datos
     */
    public function setEquipo($equipo)
    {
        $this->equipo = $equipo;

        return $this;
    }

    /**
     * Get equipo
     *
     * @return string
     */
    public function getEquipo()
    {
        return $this->equipo;
    }

    /**
     * Set loteria
     *
     * @param boolean $loteria
     *
     * @return Datos
     */
    public function setLoteria($loteria)
    {
        $this->loteria = $loteria;

        return $this;
    }

    /**
     * Get loteria
     *
     * @return boolean
     */
    public function getLoteria()
    {
        return $this->loteria;
    }

    /**
     * Set titular
     *
     * @param string $titular
     *
     * @return Datos
     */
    public function setTitular($titular)
    {
        $this->titular = $titular;

        return $this;
    }

    /**
     * Get titular
     *
     * @return string
     */
    public function getTitular()
    {
        return $this->titular;
    }

    /**
     * Set dniTitular
     *
     * @param string $dniTitular
     *
     * @return Datos
     */
    public function setDniTitular($dniTitular)
    {
        $this->dni_titular = $dniTitular;

        return $this;
    }

    /**
     * Get dniTitular
     *
     * @return string
     */
    public function getDniTitular()
    {
        return $this->dni_titular;
    }

    /**
     * Set direccionTitular
     *
     * @param string $direccionTitular
     *
     * @return Datos
     */
    public function setDireccionTitular($direccionTitular)
    {
        $this->direccion_titular = $direccionTitular;

        return $this;
    }

    /**
     * Get direccionTitular
     *
     * @return string
     */
    public function getDireccionTitular()
    {
        return $this->direccion_titular;
    }

    /**
     * Set cpTitular
     *
     * @param string $cpTitular
     *
     * @return Datos
     */
    public function setCpTitular($cpTitular)
    {
        $this->cp_titular = $cpTitular;

        return $this;
    }

    /**
     * Get cpTitular
     *
     * @return string
     */
    public function getCpTitular()
    {
        return $this->cp_titular;
    }

    /**
     * Set poblacionTitular
     *
     * @param string $poblacionTitular
     *
     * @return Datos
     */
    public function setPoblacionTitular($poblacionTitular)
    {
        $this->poblacion_titular = $poblacionTitular;

        return $this;
    }

    /**
     * Get poblacionTitular
     *
     * @return string
     */
    public function getPoblacionTitular()
    {
        return $this->poblacion_titular;
    }

    /**
     * Set iban
     *
     * @param string $iban
     *
     * @return Datos
     */
    public function setIban($iban)
    {
        $this->iban = $iban;

        return $this;
    }

    /**
     * Get iban
     *
     * @return string
     */
    public function getIban()
    {
        return $this->iban;
    }

    /**
     * Set jugador
     *
     * @param boolean $jugador
     *
     * @return Datos
     */
    public function setJugador($jugador)
    {
        $this->jugador = $jugador;

        return $this;
    }

    /**
     * Get jugador
     *
     * @return boolean
     */
    public function getJugador()
    {
        return $this->jugador;
    }

    /**
     * Set entrenador
     *
     * @param boolean $entrenador
     *
     * @return Datos
     */
    public function setEntrenador($entrenador)
    {
        $this->entrenador = $entrenador;

        return $this;
    }

    /**
     * Get entrenador
     *
     * @return boolean
     */
    public function getEntrenador()
    {
        return $this->entrenador;
    }

    /**
     * Set tutor
     *
     * @param boolean $tutor
     *
     * @return Datos
     */
    public function setTutor($tutor)
    {
        $this->tutor = $tutor;

        return $this;
    }

    /**
     * Get tutor
     *
     * @return boolean
     */
    public function getTutor()
    {
        return $this->tutor;
    }

    /**
     * Set documentos
     *
     * @param array $documentos
     *
     * @return Datos
     */
    public function setDocumentos($documentos)
    {
        $this->documentos = $documentos;

        return $this;
    }

    /**
     * Get documentos
     *
     * @return array
     */
    public function getDocumentos()
    {
        return $this->documentos;
    }

    /**
     * Set confirmado
     *
     * @param boolean $confirmado
     *
     * @return Datos
     */
    public function setConfirmado($confirmado)
    {
        $this->confirmado = $confirmado;

        return $this;
    }

    /**
     * Get confirmado
     *
     * @return boolean
     */
    public function getConfirmado()
    {
        return $this->confirmado;
    }
}

