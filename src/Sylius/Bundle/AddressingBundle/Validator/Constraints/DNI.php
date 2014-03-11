<?php
// src/Sylius/Bundle/AddressingBundle/Validator/Constraints/DNI.php
namespace Sylius\Bundle\AddressingBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class DNI extends Constraint
{
    public $message = 'Debe introducir un DNI/NIE válido.';
}