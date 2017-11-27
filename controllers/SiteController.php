<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\Cookie;

class SiteController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }


    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {

            $usernameCookie = new  Cookie([
                'name' => 'username',
                'value' => $model->username,
            ]);

            $passwordCookie = new  Cookie([
                'name' => 'password',
                'value' => $model->password,
            ]);

            $rememberCookie = new  Cookie([
                'name' => 'remember',
                'value' => $model->rememberMe,
            ]);

            Yii::$app->getResponse()->getCookies()->add($passwordCookie);
            Yii::$app->getResponse()->getCookies()->add($usernameCookie);
            Yii::$app->getResponse()->getCookies()->add($rememberCookie);

            return $this->goBack();
        } 
 
        $cookies = Yii::$app->request->cookies;
        if($cookies->getValue('remember') == 1) 
        {
            $pass = $cookies->getValue('password');
            $username = $cookies->getValue('username');
        }else{
            $pass = null;
            $username = null;
        }

        return $this->render('login', [
            'model' => $model, 'pass' =>$pass, 'username'=>$username
        ]);
    }

    public function actionTry(){
        $names = ['Teh','Cheang','Cheng','Chang','Ng'];

        return $this->render('about',['names'=>$names]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect(['login']);
    }

}
