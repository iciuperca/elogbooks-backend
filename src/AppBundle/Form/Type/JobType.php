<?php

namespace AppBundle\Form\Type;

use AppBundle\Entity\Job;
use AppBundle\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JobType extends AbstractApiType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('description', null, [])
            ->add('status', ChoiceType::class, [
                'choices' => [
                    Job::STATUS_OPEN, Job::STATUS_DONE
                ]
            ])
            ->add('user', EntityType::class, [
                'class' => User::class
            ])
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Job::class,
            'csrf_protection' => false,
        ));
    }
}