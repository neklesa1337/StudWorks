<?php

namespace App\StudWorks\Order\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class ResultFileType
 * @package App\StudWorks\Order\Form
 */
class ResultFileType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('resultFile', FileType::class, [
                'required' => true
            ])
            ->add('submit', SubmitType::class)
        ;
    }
}
