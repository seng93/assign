<?php

namespace app\components;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class NameList extends Widget
{
    public $names;
    public $list = '<li> {name} </li>';
    public $tag = 'ol';

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        foreach($this->names as $name){
            $value[]=$this->renderName($name,$this->list);
        }

        echo Html::tag($this->tag,implode('',$value));
    }

    public function renderName($name,$list)
    {
        $arr = array (
                "{name}" =>$name,
            );
        return strtr($list,$arr);
    }

}
