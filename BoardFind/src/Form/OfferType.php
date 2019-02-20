<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class OfferType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, array('label' => '*Title: ' , 'attr' => array('class' => 'input2')))
            ->add('nameofgame', TextType::class, array('label' => 'Name of the Game:','attr' => array('class' => 'create button1')))
            ->add('description', TextType::class, array('label' => 'Description: ' , 'attr' => array('class' => 'input2')))
            ->add('price', TextType::class, array('label' => '*Price: ' , 'attr' => array('class' => 'input2')))
            ->add('save', SubmitType::class, array('label' => 'Post Offer','attr' => array('class' => 'create button1')))
        ;
    }
}