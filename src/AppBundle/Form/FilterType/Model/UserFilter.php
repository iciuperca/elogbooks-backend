<?php

namespace AppBundle\Form\FilterType\Model;


use Symfony\Component\Validator\Constraints as Assert;

class UserFilter extends ListFilter
{
    /**
     * @var string
     *
     * @Assert\Type(type="string")
     */
    protected $name;

    /**
     * @var string
     *
     * @Assert\Type(type="string")
     */
    protected $email;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return UserFilter
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return UserFilter
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }
}