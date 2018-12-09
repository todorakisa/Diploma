<?php
/**
 * Created by PhpStorm.
 * User: Todor_Dimitrov_
 * Date: 9.12.2018 г.
 * Time: 22:28
 */
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class)
            ->add('email', TextType::class)
            ->add('password', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Create User'))
        ;
    }
}