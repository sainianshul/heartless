<?php

namespace app\controllers;
use app\models\User;

class UserController extends \yii\web\Controller
{

  public function  actionSignup(){

     $this->layout = 'site';
   
    $model = new User();
    $model->scenario = 'signup';
    if($model->load(\Yii::$app->request->post()) && $model->validate() && $model->signup()){
      return $this->redirect(['login']);
    }

    return $this->render('signup', ['model' => $model]);

  }


  public function actionLogin()
  {
      $this->layout = 'site';
      $model = new User();
      $model->scenario = 'login';
  
      if (!\Yii::$app->user->isGuest) {
          return $this->goHome();
      }
  
      if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
          $user = User::findByUsername($model->username); // Use findByUsername method
  
          if ($user && \Yii::$app->security->validatePassword($model->password, $user->password)) {
              // Use Yii::$app->user->login() with duration (optional)
              \Yii::$app->user->login($user, 3600 * 24 * 30); // 30 days login
              return $this->redirect(['dashboard/index']);
          } else {
              $model->addError('password', 'Username or password is incorrect');
          }
      }
  
      return $this->render('login', ['model' => $model]);
  }
  

  public function actionLogout()
  {
      \Yii::$app->user->logout();
  
      return $this->redirect(['login']);
  }



}
