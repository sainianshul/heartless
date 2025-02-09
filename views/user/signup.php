<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Sign Up';
?>
<div class="signup-container">
    <div class="signup-card">
        <h2>Sign Up</h2>

        <?php $form = ActiveForm::begin(['id' => 'signup-form']); ?>

        <?= $form->field($model, 'email')->textInput(['placeholder' => 'Enter your email', 'class' => 'form-control'])->label('Email Address') ?>

        <?= $form->field($model, 'username')->textInput(['placeholder' => 'Choose a username', 'class' => 'form-control'])->label('Username') ?>

        <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Choose a password', 'class' => 'form-control'])->label('Password') ?>

        <?= $form->field($model, 'confirm_password')->passwordInput(['placeholder' => 'Confirm your password', 'class' => 'form-control'])->label('Confirm Password') ?>

        <div class="form-group">
            <?= Html::submitButton('Sign Up', ['class' => 'btn-mine-1']) ?>
        </div>

        <?php ActiveForm::end(); ?>

        <div class="signup-links">
            <p>Already have an account? <?= Html::a('Login', ['login']) ?></p>
            <p><?= Html::a('Forgot Password?', ['site/request-password-reset']) ?></p>
        </div>
    </div>
</div>
