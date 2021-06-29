<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 22.06.2018
 * Time: 20:07
 */

namespace app\commands;


use yii\console\Controller;

class RbacController extends Controller
{
    public function actionRun()
    {
        $am = \Yii::$app->authManager;

        $admin = $am->createRole('admin');
        $user = $am->createRole('user');
        $readonly = $am->createRole('readonly');

        $am->add($admin);
        $am->add($user);
        $am->add($readonly);

        $operationManageUsers = $am->createPermission('manageUsers');
        $operationAddArticles = $am->createPermission('addArticles');
        $operationEditArticles = $am->createPermission('editArticles');
        $operationAddComments = $am->createPermission('addComments');

        $am->add($operationManageUsers);
        $am->add($operationAddArticles);
        $am->add($operationEditArticles);
        $am->add($operationAddComments);


        $am->addChild($admin, $operationManageUsers);
        $am->addChild($admin, $operationAddArticles);
        $am->addChild($admin, $operationEditArticles);
        $am->addChild($admin, $operationAddComments);

        $am->addChild($user, $operationAddArticles);
        $am->addChild($user, $operationEditArticles);
        $am->addChild($user, $operationAddComments);

        $am->assign($admin, 1);
        $am->assign($admin, 2);

    }
}