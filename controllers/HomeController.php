<?php

namespace app\controllers;

use Yii;
use app\models\Tenant;
use app\models\Category;
use app\models\Floorlvl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\Zone;

class HomeController extends \yii\web\Controller
{
    public function actionIndex()
    {    	
        return $this->render('index');
    }

    public function actionZone()
    { 
    	$tenants = Tenant::find()->all();
    	$zones = Zone::find()->all();

        return $this->render('zone', ['tenants' => $tenants, 'zones' => $zones]);
    }

    public function actionFloor()
    { 
    	$tenants = Tenant::find()->all();
    	$floors = Floorlvl::find()->all();
    	
        return $this->render('floor', ['tenants' => $tenants, 'floors' => $floors]);
    }

    public function actionCategory()
    { 
    	$tenants = Tenant::find()->all();
    	$categories = Category::find()->all();
    	
        return $this->render('category', ['tenants' => $tenants, 'categories' => $categories]);
    }

    public function actionViewTenantDetail($id)
    {        
        return $this->render('view-tenant-detail', ['model' => $this->findModel($id)]);
    }

    public function actionView($id)
    {        
        return $this->render('view', ['model' => $this->findModel($id)]);
    }

    protected function findModel($id)
    {
        if (($model = Tenant::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
