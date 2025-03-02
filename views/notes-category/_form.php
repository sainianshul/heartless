<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\NotesCategory;

/** @var yii\web\View $this */
/** @var app\models\NotesCategory $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="notes-category-form custom-form-container">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'name')->textInput(['placeholder' => 'Enter category name']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'status_id')->dropDownList(NotesCategory::getStatusOptions(),['value' => $model->status_id ?? NotesCategory::STATUS_ACTIVE]) ?>
        </div>
    </div>
    <div class="form-group text-right d-flex justify-content-end">
        <?= Html::submitButton('<i class="fas fa-save"></i> Save', ['class' => 'btn submit-btn']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>