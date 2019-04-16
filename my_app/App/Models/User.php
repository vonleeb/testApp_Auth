<?php

namespace App\Models;

use Doctrine\ORM\Annotation as ORM;

/**
 * @ORM\Entity @ORM\Table(name="users")
 **/
class User
{
    /**
     * @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue
     */
    private $id;
    /**
     * @ORM\Column(type="string")
     */
    private $email;
    /**
     * @ORM\Column(type="string")
     */
    private $fio;
    /**
     * @ORM\Column(type="string")
     */
    private $password;
    /**
     * @ORM\Column(type="string")
     */
    private $created_at;

    public function __construct()
    {
        $this->created_at = date('Y-m-d H:i:s');
    }

    public function getId()
    {
        return $this->id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getFio()
    {
        return $this->fio;
    }

    public function setFio($fio)
    {
        $this->fio = $fio;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }
}
