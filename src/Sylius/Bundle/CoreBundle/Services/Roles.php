<?php

/*
* This file is part of the Sylius package.
*
* (c) Paweł Jędrzejewski
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace Sylius\Bundle\CoreBundle\Services;

class Roles
{
    private $roles;

    /**
     * Constructor
     */
    public function __construct($hierarchy = array())
    {
        $this->roles = $this->setRoles($hierarchy);
    }

    /**
     * Set roles for forms
     */
    public function setRoles($hierarchy = array())
    {
        $roles = array();

        foreach ($hierarchy as $key => $row) {
            foreach ($row as $key => $haystack) {
                $name = '';
                $roleName = explode('_', $haystack);
                array_shift($roleName);
                $i = 0;
                $len = count($roleName);
                foreach ($roleName as $part) {
                    if ($i != $len-1) {
                        $name .= $part . ' ';
                    }
                    else {
                        $name .= $part;
                    }
                    $i++;
                }
                //array_push($roles, array($haystack => $name));
                $roles[$haystack] = $name;
            }
        }

        return $roles;
    }

    /**
     * Get current roles
     */
    public function getRoles()
    {
        return $this->roles;
    }
   
}