<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\notes\models\NotesCategory $model */

$this->title = 'Update Notes Category: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Notes Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="notes-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
