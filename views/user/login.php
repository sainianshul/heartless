<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Login';
?>
<div class="login-container">
    <div class="login-card">
        <h2>Login</h2>

        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

        <?= $form->field($model, 'username')->textInput(['placeholder' => 'Enter username', 'class' => 'form-control'])->label('Username') ?>

        <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Enter password', 'class' => 'form-control'])->label('Password') ?>

        <div class="form-group">
            <?= Html::submitButton('Login', ['class' => 'btn-mine-1']) ?>
        </div>

        <?php ActiveForm::end(); ?>

        <div class="signup-links">
            <p>Not have Account <?= Html::a('Create Account', ['signup']) ?></p>
            <p><?= Html::a('Forgot Password?', ['site/request-password-reset']) ?></p>
        </div>
    </div>
</div>
