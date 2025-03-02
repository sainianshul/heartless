<?php

use yii\helpers\Html;
use app\components\HeaderCard;

/** @var yii\web\View $this */
/** @var app\models\NotesCategory $model */

$this->title = 'Update Notes Category: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Notes Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="notes-category-update">

<?= HeaderCard::widget([
    'title' => $this->title,
    'breadcrumbs' => [
        ['label' => 'Notes Categories', 'url' => ['notes-category/index']],
        ['label' => $this->title],
    ],
]) ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
