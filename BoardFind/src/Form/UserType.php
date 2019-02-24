<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;


class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    $builder
        ->add('username', TextType::class , array('label' => '*Username:  ' ,'attr' => array('class' => 'input2')))
        ->add('name', TextType::class , array('label' => '*Name:  ' ,'attr' => array('class' => 'input2')))
        ->add('lastname', TextType::class , array('label' => '*Last Name:  ' ,'attr' => array('class' => 'input2')))
        ->add('password', PasswordType::class, array('label' => '*Password:  ' ,'attr' => array('class' => 'input2')))
        ->add('telephone', TextType::class, array('label' => '*Telephone Number:  ' ,'attr' => array('class' => 'input2')))
        ->add('email', TextType::class, array('label' => '*Email:  ' ,'attr' => array('class' => 'input2')))
        ->add('save', SubmitType::class, array('label' => 'Register','attr' => array('class' => 'create button1')))
    ;
}
}