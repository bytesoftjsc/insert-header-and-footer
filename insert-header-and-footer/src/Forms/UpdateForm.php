<?php

namespace Botble\InsertHeaderAndFooter\Forms;

use Botble\Base\Forms\FormAbstract;
use Botble\Base\Models\BaseModel;
use File;

class UpdateForm extends FormAbstract
{
    /**
     * @author thuandc@bytesoft.net
     */
    public function buildForm()
    {
        $this
            ->setupModel(new BaseModel)
            ->setUrl(route('insert-header-and-footer.edit'))
            ->add('insert_to_header', 'textarea', [
                'label' => __('Header'),
                'label_attr' => ['class' => 'control-label'],
                'value' => setting('insert_to_header'),
            ])
            ->add('insert_to_footer', 'textarea', [
                'label' => __('Footer'),
                'label_attr' => ['class' => 'control-label'],
                'value' => setting('insert_to_footer'),
            ]);
    }
}
