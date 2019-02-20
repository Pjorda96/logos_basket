<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping\OneToMany;

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
     * One Category has Many Categories.
     * @OneToMany(targetEntity="Datos", mappedBy="tutor")
     */
    private $children;

    /**
     * @var string
     *
     * @ManyToOne(targetEntity="Datos", inversedBy="children")
     * @JoinColumn(name="tutor_id", referencedColumnName="id")
     */
    private $tutor;

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
     * @var integer
     *
     * @ORM\OneToOne(targetEntity="Category")
     * @JoinColumn(name="categoria_id", referencedColumnName="id")
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
     * @ORM\Column(name="dni_itular", type="string", length=10, nullable=true)
     */
    private $dniTitular;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion_titular", type="string", length=50, nullable=true)
     */
    private $direccionTitular;

    /**
     * @var string
     *
     * @ORM\Column(name="cp_titular", type="string", length=50, nullable=true)
     */
    private $cpTitular;

    /**
     * @var string
     *
     * @ORM\Column(name="poblacion_titular", type="string", length=50, nullable=true)
     */
    private $poblacionTitular;

    /**
     * @var string
     *
     * @ORM\Column(name="iban", type="string", length=50, nullable=true)
     */
    private $iban;

    /**
     * @var string
     *
     * @ORM\Column(name="is_jugador", type="boolean")
     */
    private $isJugador;

    /**
     * @var string
     *
     * @ORM\Column(name="is_entrenador", type="boolean")
     */
    private $isEntrenador;

    /**
     * @var string
     *
     * @ORM\Column(name="tutor", type="boolean")
     */
    private $isTutor;

    /**
     * @var string
     *
     * @ORM\Column(name="documentos", type="json_array", nullable=true)
     */
    private $documentos;

    /**
     * @var string
     *
     * @ORM\Column(name="confirmado", type="boolean")
     */
    private $confirmado;


    /**
     * @var resource
     * @Assert\File(maxSize="10000000")
     * @Assert\File(mimeTypes={ "image/png", "image/jpeg" }) 
     * @ORM\Column(name="image", type="blob", nullable=true)
     */
    private $image;


    public function __construct()
    {
        $this->club = 'Logos Basket Sedaví';
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Remove child
     *
     * @param \AppBundle\Entity\Datos $child
     */
    public function removeChild(\AppBundle\Entity\Datos $child)
    {
        $this->children->removeElement($child);
    }

    /**
     * Get children
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Set idTutor
     *
     * @param integer $idTutor
     *
     * @return Datos
     */
    public function setTutorId($tutorId)
    {
        $this->tutor_id = $tutorId;

        return $this;
    }

    /**
     * Get tutorId
     *
     * @return integer
     */
    public function getTutorId()
    {
        return $this->tutor;
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
        $this->dniTitular = $dniTitular;

        return $this;
    }

    /**
     * Get dniTitular
     *
     * @return string
     */
    public function getDniTitular()
    {
        return $this->dniTitular;
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
        $this->direccionTitular = $direccionTitular;

        return $this;
    }

    /**
     * Get direccionTitular
     *
     * @return string
     */
    public function getDireccionTitular()
    {
        return $this->direccionTitular;
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
        $this->cpTitular = $cpTitular;

        return $this;
    }

    /**
     * Get cpTitular
     *
     * @return string
     */
    public function getCpTitular()
    {
        return $this->cpTitular;
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
        $this->poblacionTitular = $poblacionTitular;

        return $this;
    }

    /**
     * Get poblacionTitular
     *
     * @return string
     */
    public function getPoblacionTitular()
    {
        return $this->poblacionTitular;
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
        $this->isJugador = $jugador;

        return $this;
    }

    /**
     * Get jugador
     *
     * @return boolean
     */
    public function getJugador()
    {
        return $this->isJugador;
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
        $this->isEntrenador = $entrenador;

        return $this;
    }

    /**
     * Get entrenador
     *
     * @return boolean
     */
    public function getEntrenador()
    {
        return $this->isEntrenador;
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
        $this->isTutor = $tutor;

        return $this;
    }

    /**
     * Get tutor
     *
     * @return boolean
     */
    public function getTutor()
    {
        return $this->isTutor;
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

    public function __toString() {
        return $this->nombre.$this->apellido1.$this->apellido2;
    }

    /**
     * Set isJugador
     *
     * @param boolean $isJugador
     *
     * @return Datos
     */
    public function setIsJugador($isJugador)
    {
        $this->isJugador = $isJugador;

        return $this;
    }

    /**
     * Get isJugador
     *
     * @return boolean
     */
    public function getIsJugador()
    {
        return $this->isJugador;
    }

    /**
     * Set isEntrenador
     *
     * @param boolean $isEntrenador
     *
     * @return Datos
     */
    public function setIsEntrenador($isEntrenador)
    {
        $this->isEntrenador = $isEntrenador;

        return $this;
    }

    /**
     * Get isEntrenador
     *
     * @return boolean
     */
    public function getIsEntrenador()
    {
        return $this->isEntrenador;
    }

    /**
     * Set isTutor
     *
     * @param boolean $isTutor
     *
     * @return Datos
     */
    public function setIsTutor($isTutor)
    {
        $this->isTutor = $isTutor;

        return $this;
    }

    /**
     * Get isTutor
     *
     * @return boolean
     */
    public function getIsTutor()
    {
        return $this->isTutor;
    }

    /**
     * Add child
     *
     * @param \AppBundle\Entity\Datos $child
     *
     * @return Datos
     */
    public function addChild(\AppBundle\Entity\Datos $child)
    {
        $this->children[] = $child;

        return $this;
    }

       /**
     * Set image
     *
     * @param blob $image
     *      
     * @return Datos
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return blob
     */
    public function getImage()
    {
        return $this->image;
    }



    public function upload()
    {
        if (null === $this->image) {
            return;
        }
    
        //$strm = fopen($this->file,'rb');
        $strm = fopen($this->image->getRealPath(),'rb');
        $this->setImage(stream_get_contents($strm));
    }

    

    
}
