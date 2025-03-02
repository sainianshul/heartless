<?php

use yii\helpers\Html;
use app\components\HeaderCard;

/** @var yii\web\View $this */
/** @var app\models\NotesCategory $model */

$this->title = 'Create Notes Category';
?>
<div class="notes-category-create">

<?= HeaderCard::widget([
    'title' => $this->title,
    'breadcrumbs' => [
        ['label' => 'Notes Categories', 'url' => ['notes-category/index']],
        ['label' => $this->title],
    ],
]) ?>
   

    <!-- Form Section -->

        <?= $this->render('_form', ['model' => $model]) ?>
   

</div>
