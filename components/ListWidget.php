<?php

namespace app\components;

use Yii;
use yii\base\InvalidConfigException;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class ListWidget extends Widget
{
 
    public $model;
    public $attributes;

    public $row = '<tr><th style="color:grey;">{label}</th><td style="color:green;" >{value}</td></tr>';

    public $tables = ['class' => 'table table-bordered'];

    public function init()
    {
        if ($this->model === null) {
            throw new InvalidConfigException('Please specify the "model" property.');
        }

    }

    public function run()
    {
        foreach ($this->attributes as $i => $attribute) {

            if (is_string($attribute)) {
                if (preg_match('/^([\w\.]+)(:(\w*))?(:(.*))?$/', $attribute, $matches)) 
                    $attribute = [
                        'attribute' => $matches[1],
                        'format' => 'text',
                    ];
            }

            if (isset($attribute['attribute'])) {
                $attributeName = $attribute['attribute'];

                $attribute['label'] = $this->model->getAttributeLabel($attributeName);

                $attribute['value'] = ArrayHelper::getValue($this->model, $attributeName);
            } 
            
            $this->attributes[$i] = $attribute;
        }

        foreach ($this->attributes as $attribute) {
            $values[] = $this->renderAttribute($attribute);
        }

        $tables = $this->tables;
        $tag = ArrayHelper::remove($tables, 'tag', 'table');
        echo Html::tag($tag, implode("\n", $values), $tables);
    }

    protected function renderAttribute($attribute)
    {
        $arr = array(
            '{label}' => $attribute['label'],
            '{value}' => $attribute['value'],
        );

        return strtr($this->row, $arr);
    }

}
