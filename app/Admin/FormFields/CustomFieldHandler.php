<?php

namespace App\Admin\FormFields;

use TCG\Voyager\FormFields\AbstractHandler;

class CustomFieldHandler extends AbstractHandler
{
    protected $codename = 'custom_field';

    public function createContent($row, $dataType, $dataTypeContent, $options)
    {
        return view('voyager::formfields.custom_field', [
            'row'             => $row,
            'options'         => $options,
            'dataType'        => $dataType,
            'dataTypeContent' => $dataTypeContent,
        ]);
    }
}
