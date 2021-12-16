<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'Nome',
                'attr' => [
                    'placeholder' => 'Inserisci il nome'
                ]
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Cognome',
                'attr' => [
                    'placeholder' => 'Inserisci il cognome'
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => "Indirizzo e-mail",
                'attr' => [
                    'placeholder' => "Inserisci l'indirizzo e-mail"
                ]
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Le due password devono corrispondere',
                'label' => 'Password',
                'required' => true,
                'first_options' => ['label' => 'Password'],
                'second_options' => ['label' => 'Ripeti password']
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Registrati'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
