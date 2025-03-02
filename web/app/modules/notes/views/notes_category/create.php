<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\notes\models\NotesCategory $model */

$this->title = 'Create Notes Category';
$this->params['breadcrumbs'][] = ['label' => 'Notes Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notes-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
