<?php
/**
 * SnippetType class
 *
 * @author Benjamin Grandfond <benjaming@theodo.fr>
 * @since 07/11/11
 */

namespace Snippet\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class SnippetType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('name', 'text');
        $builder->add('code', 'textarea');
    }

    public function getName()
    {
        return 'snippet';
    }

}
