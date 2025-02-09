<?php

namespace app\controllers;


use app\models\User;
class DashboardController extends \yii\web\Controller
{

    public function beforeAction($action)
    {
        if (\Yii::$app->user->isGuest) {
            return $this->redirect(['user/login']);
        }
        return parent::beforeAction($action);
    }


    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true, // This is required for the rule to be evaluated
                        'matchCallback' => function ($rule, $action) {
                            return User::isUser(); // Custom logic to check user role
                        },
                    ],
                ],
            ],
        ];
    }
    

    public function actionIndex()
    {
        return $this->render('index');
    }

}
