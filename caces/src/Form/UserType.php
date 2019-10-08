<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'E-mail',
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'Veuillez renseigner ce champ !',
                    ]),
                    new Assert\Regex([
                        'pattern'=>"/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/",
                        'message'=>'Veuillez renseigner une adresse e-mail valide!',
                    ])
            ]
            ]);
            
            // ->add('role')


            if ($options['action'] == true) {
                
            $builder
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Les mots de passe doivent être identiques',
                'options' => ['attr' => ['class' => 'password-field']],
                'required' => true,
                'first_options' => ['label' => 'Mot de passe'],
                'second_options' => ['label' => 'Confirmer Mot de passe'],
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'Veuillez renseigner ce champ !',
                    ]),
                    new Assert\Length([
                        'min' => 5,
                        'minMessage' => 'Le mot de passe doit contenir au minimun 5 caractères',
                    ])
                   
                ]
               
                ]);
            }
            
                
            
            $builder
            ->add('firstName', TextType::class, [
                'label' => 'Prénom',
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'Veuillez renseigner ce champ !',
                    ]),
                    new Assert\Length([
                        'min' => 2,
                        'minMessage' => 'Le prénom doit contenir au minimum 2 caractères',
                    ]),
                ]
            ])


            ->add('lastName', TextType::class, [
                'label' => 'Nom',
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'Veuillez renseigner ce champ !',
                    ]),
                    new Assert\Length([
                        'min' => 2,
                        'minMessage' => 'Le nom de famille doit contenir au minimum 2 caractères',
                    ]),
                ]
            ])


            ->add('question', ChoiceType::class, [
                'label' => 'Je passe le CACES pour la 1ère fois',
                'choices' => ['Oui' => 1, 'Non' => 0],
            ])


            ->add('submit', SubmitType::class,[
                'label' => 'Valider',
                'attr'=>['class'=>'btn btn-danger']
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'attr' => [
                'novalidate' => 'novalidate',
            ],
        ]);
    }
}
