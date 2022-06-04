<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EmpleadoRol
 *
 * @ORM\Table(name="empleado_rol", indexes={@ORM\Index(name="empleado_id", columns={"empleado_id"}), @ORM\Index(name="rol_id", columns={"rol_id"})})
 * @ORM\Entity
 */
class EmpleadoRol
{
    /**
     * @var integer
     *
     * @ORM\Column(name="empleado_rol", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $empleadoRol;

    /**
     * @var \Empleado
     *
     * @ORM\ManyToOne(targetEntity="Empleado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="empleado_id", referencedColumnName="id")
     * })
     */
    private $empleado;

    /**
     * @var \Roles
     *
     * @ORM\ManyToOne(targetEntity="Roles")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="rol_id", referencedColumnName="id")
     * })
     */
    private $rol;



    /**
     * Get empleadoRol
     *
     * @return integer
     */
    public function getEmpleadoRol()
    {
        return $this->empleadoRol;
    }

    /**
     * Set empleado
     *
     * @param \AppBundle\Entity\Empleado $empleado
     *
     * @return EmpleadoRol
     */
    public function setEmpleado(\AppBundle\Entity\Empleado $empleado = null)
    {
        $this->empleado = $empleado;

        return $this;
    }

    /**
     * Get empleado
     *
     * @return \AppBundle\Entity\Empleado
     */
    public function getEmpleado()
    {
        return $this->empleado;
    }

    /**
     * Set rol
     *
     * @param \AppBundle\Entity\Roles $rol
     *
     * @return EmpleadoRol
     */
    public function setRol(\AppBundle\Entity\Roles $rol = null)
    {
        $this->rol = $rol;

        return $this;
    }

    /**
     * Get rol
     *
     * @return \AppBundle\Entity\Roles
     */
    public function getRol()
    {
        return $this->rol;
    }
}
