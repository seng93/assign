<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\db\Command;

class UserController extends Controller
{

    public function behaviors()
    {
        return [
            'access' =>[
                'class' =>AccessControl::className(),
                'rules' =>[
                    [
                        'allow' => true,
                        'actions' => ['index','view','create','update','delete'],
                        'roles' => ['manageUser'],
                    ],
                ],              
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post())) {
            $auth = \Yii::$app->authManager;
            $authorRole = $auth->getRole($model->role);
            if($model->save());
            $auth->assign($authorRole, $model->id);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->scenario = 'update';

        if ($model->load(Yii::$app->request->post())) {

            $manager = Yii::$app->authManager;
            $authorRole = $manager->getRole($model->role);
            $manager->revokeAll($id);
            
            $model->oldPassword = sha1($model->oldPassword);
            if($model->oldPassword == $model->password)
            {
                $manager->assign($authorRole, $id);
                $model->password = $model->newPass;
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
            else
            {
                Yii::$app->session->setFlash('error', 'Incorrect Old Password');
                return $this->render('update', [
                'model' => $model 
                ]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionDelete($id)
    {
        Yii::$app->db->createCommand('DELETE FROM auth_assignment
        WHERE user_id =:id')->bindParam(':id',$id)->execute();

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
