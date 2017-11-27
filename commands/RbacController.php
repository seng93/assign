<?php
namespace app\commands;
use Yii;
use yii\console\Controller;
class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        $manageUser = $auth->createPermission('manageUser');
        $manageUser->description = 'Manage user';
        $auth->add($manageUser);

        $manageTenant = $auth->createPermission('manageTenant');
        $manageTenant->description = 'Manage tenant';
        $auth->add($manageTenant);

        $manageZone = $auth->createPermission('manageZone');
        $manageZone->description = 'Manage Zone';
        $auth->add($manageZone);

        $manageFloor = $auth->createPermission('manageFloor');
        $manageFloor->description = 'Manage Floor';
        $auth->add($manageFloor);

        $manageCategory = $auth->createPermission('manageCategory');
        $manageCategory->description = 'Manage Category';
        $auth->add($manageCategory);

        $viewZone = $auth->createPermission('viewZone');
        $viewZone->description = 'View zone';
        $auth->add($viewZone);

        $viewFloor = $auth->createPermission('viewFloor');
        $viewFloor->description = 'View floor';
        $auth->add($viewFloor);

        $viewCategory = $auth->createPermission('viewCategory');
        $viewCategory->description = 'View category';
        $auth->add($viewCategory);

        $editor = $auth->createRole('editor');
        $auth->add($editor);
        $auth->addChild($editor, $manageTenant);
        $auth->addChild($editor, $viewZone);
        $auth->addChild($editor, $viewFloor);
        $auth->addChild($editor, $viewCategory);

        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $manageUser);
        $auth->addChild($admin, $manageZone);
        $auth->addChild($admin, $manageFloor);
        $auth->addChild($admin, $manageCategory);
        $auth->addChild($admin, $editor);


        $auth->assign($admin, 1);
        $auth->assign($editor, 2);
        $auth->assign($editor, 3);
        $auth->assign($editor, 4);
    }
}