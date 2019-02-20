<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Datos", inversedBy="tutor")
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nif", type="string", length=10, unique=true)
     */
    private $nif;

    /**
     * @Assert\Regex(
     *     pattern = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/",
     *     match=true,
     *     message="La contraseña debe contener una mayuscula, una minuscula, un numero y debe ser minimo de 8 caracteres"
     * )
     * @var string
     */
    private $plainPassword;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var array
     *
     * @ORM\Column(name="roles", type="json_array")
     */
    private $roles;



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
     * Set nif
     *
     * @param string $nif
     *
     * @return User
     */
    public function setNif($nif)
    {
        $this->nif = $nif;

        return $this;
    }

    /**
     * Get nif
     *
     * @return string
     */
    public function getNif()
    {
        return $this->nif;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set roles
     *
     * @param array $roles
     *
     * @return User
     */
    public function setRoles($roles)
    {
        $roles_json=json_encode($roles);
        $this->roles = $roles_json;

        return $this;
    }

    /**
     * Get roles
     *
     * @return array
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_JUGADOR';

        return array_unique($roles);
    }

    public function getSalt()
    {
        // The bcrypt and argon2i algorithms don't require a separate salt.
        // You *may* need a real salt if you choose a different encoder.
        return null;
    }

    public function eraseCredentials()
    {
    }

    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    public function setPlainPassword($password)
    {
        $this->plainPassword = $password;
    }

    public function getUsername()
    {
        return $this->nif;
    }

    public function setUsername($username)
    {
        $this->nif = $username;
    }

    public function __construct()
    {
        $this->roles = array('ROLE_TUTOR');
    }


    public function esNifValido(ExecutionContext $context)
    {
        $nif = $this->getNif();
    
        // Comprobar que el formato sea correcto
        if (0 === preg_match("/\d{1,8}[a-z]/i", $nif)) {
            $context->addViolationAtSubPath('nif', 'El NIF introducido no tiene el formato correcto (entre 1 y 8 números seguidos de una letra, sin guiones y sin dejar ningún espacio en blanco)', array(), null);

            return;
        }

        // Comprobar que la letra cumple con el algoritmo
        $numero = substr($nif, 0, -1);
        $letra  = strtoupper(substr($nif, -1));
        if ($letra != substr("TRWAGMYFPDXBNJZSQVHLCKE", strtr($numero, "XYZ", "012")%23, 1)) {
            $context->addViolationAtSubPath('nif', 'La letra no coincide con el número del NIF. Comprueba que has escrito bien tanto el número como la letra', array(), null);
        }
    }


}
