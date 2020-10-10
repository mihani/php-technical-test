<?php

namespace App\Form;

use App\Entity\Trip;
use App\Entity\User;
use App\Form\DataTransformer\DateIntervalArrayToSecondTransformer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateIntervalType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\TripType as TripTypeEntity;

class TripType extends AbstractType
{
    private $dateIntervalArrayToSecondTransformer;

    public function __construct(DateIntervalArrayToSecondTransformer $dateIntervalArrayToSecondTransformer)
    {
        $this->dateIntervalArrayToSecondTransformer = $dateIntervalArrayToSecondTransformer;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('beginDate',DateTimeType::class,[
                'date_widget' => 'single_text',
                'time_widget' => 'single_text',
                'row_attr' => ['class' => 'form-control py-4']
            ])
            ->add('duration',DateIntervalType::class,[
                'widget' => 'choice',
                'with_days' => false,
                'with_months' => false,
                'with_years' => false,
                'with_hours' => true,
                'with_minutes' => true,
                'with_seconds' => true,
                'input' => 'array',
                'row_attr' => ['class' => 'form-control py-4'],
            ])
            ->add('distance', NumberType::class, [
                'attr' => ['class' => 'form-control py-4'],
            ])
            ->add('comment', TextareaType::class, [
                'required' => false,
                'attr' => ['class' => 'form-control py-4'],
            ])
            ->add('type', EntityType::class, [
                'class' => TripTypeEntity::class,
                'choice_label' => 'name',
                'attr' => ['class' => 'form-control']
            ])
        ;

        $builder->get('duration')
            ->addModelTransformer($this->dateIntervalArrayToSecondTransformer);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Trip::class,
        ]);
    }
}
