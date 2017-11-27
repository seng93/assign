<?php

namespace app\components;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use yii\base\InvalidConfigException;

class GroupedListWidget extends widget
{
	public $groups;
	public $models;
	public $groupBy;
	public $groupName;
	public $tag = 'div';	
	public $header = '<h3 style="color:#BDC3C7;">{groups}</h3>';
	public $list = '<tr><td><a href="/{controllerPath}/{id}"> {list}</a></td><td style="color:green" align="right">Lot {lot}</td></tr>';

	public function init()
	{
		parent::init();
        if ($this->models === null || $this->groups === null) {
            throw new InvalidConfigException('Please specify the "model" property.');
        }
	}

	public function run()
	{	
    	foreach ($this->groups as $group){
    		$value[] = $this->renderGroup($group,$this->header);
    		foreach ($this->models as $model){
    			if($model[$this->groupBy] == $group[$this->groupBy]){
    					if(!isset($table)){
							$value[]="<table class='table table-striped'>";							
						}
						$table = true;
						$value[] = $this->renderList($model,$this->list);
				}
    		}
    		if(isset($table)){
    			$value[]="</table>";
    			$table = null;
    		}
    	} 
    	echo Html::tag($this->tag, implode('', $value) );
	}

	protected function renderGroup($group,$header)
	{
		$arr = array(
			"{groups}" => $group[$this->groupName],
			);
		return strtr($header,$arr);
	}

	protected function renderList($model,$list)
	{
		$arr = array(
			"{id}" => $model['tenantId'],
			"{controllerPath}" => Yii::$app->controller->id,
			"{list}" => $model['name'],
			"{lot}" => $model['lotNo']
			);

		return strtr($list,$arr);
	}
}