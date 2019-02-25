<?php
namespace App\Form;
use  App\Entity\double;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, array('label' => '*Title: ' , 'attr' => array('class' => 'input2')))
            ->add('latitude', HiddenType::class, array('label' => '*Latitude: ' , 'attr' => array('class' => 'input2')))
            ->add('longitude', HiddenType::class, array('label' => '*Longitude:','attr' => array('class' => 'create button1')))
            ->add('eventday', DateTimeType::class, array('label' => '*Day and time of the Event: ' , 'attr' => array('class' => 'input2')))
            ->add('placedescription', TextType::class, array('label' => '*Descrtiption of the Event: ' , 'attr' => array('class' => 'input2')))
            ->add('save', SubmitType::class, array('label' => 'Register Event','attr' => array('class' => 'create button1')))
        ;
    }
}