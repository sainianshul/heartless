<?php

use app\models\NotesCategory;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\components\StatsWidget;
use app\components\HeaderCard;

/** @var yii\web\View $this */
/** @var app\models\search\NotesCategory $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Notes Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notes-category-index">

<?= HeaderCard::widget([
    'title' => $this->title,
    'breadcrumbs' => [
        ['label' => 'Notes', 'url' => ['notes-category/index']],
        ['label' => $this->title],
    ],
]) ?>

    <div class="row">
    <?php echo StatsWidget::widget([
        'title' => 'Total Category',
        'value' => NotesCategory::count(),
        'icon' => 'fas fa-users',
        'color' => 'icon-primary'
    ]); ?>

    <?php echo StatsWidget::widget([
        'title' => 'Active',
        'value' => NotesCategory::countActive(),
        'icon' => 'fas fa-user-check',
        'color' => 'icon-info'
    ]); ?>

    <?= StatsWidget::widget([
        'title' => 'Sales',
        'value' => '$ 1,345',
        'icon' => 'fas fa-luggage-cart',
        'color' => 'icon-success'
    ]); ?>

    <?= StatsWidget::widget([
        'title' => 'Order',
        'value' => '576',
        'icon' => 'far fa-check-circle',
        'color' => 'icon-secondary'
    ]); ?>
</div>

    

    <?php Pjax::begin(); ?>
  
<div class="tbl-card">
<div class="row">
        <div class="col-12 text-end me-3">
            <p>
                <?php echo Html::a('<i class="fas fa-plus-circle"></i> Add New', ['create'], ['class' => 'btn btn-add']); ?>
            </p>
        </div>
    </div>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'options' => ['class' => 'custom-gridview'], 
        'tableOptions' => ['class' => 'table'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            [
                'attribute' => 'status_id',
                'format' => 'raw',
                'value' => function (NotesCategory $model) {
                    return $model->getStatusBadge();
                }
            ],
           [
    'class' => ActionColumn::className(),
    'header' => 'Actions',
    'template' => '{view} {update} {delete}',
    'contentOptions' => ['class' => 'action-buttons'],
    'buttons' => [
        'view' => function ($url, $model) {
            return Html::a('<i class="fas fa-eye"></i> View', $url, [
                'class' => 'view-btn',
                'title' => 'View',
                'data-toggle' => 'tooltip'
            ]);
        },
        'update' => function ($url, $model) {
            return Html::a('<i class="fas fa-edit"></i> Edit', $url, [
                'class' => 'update-btn',
                'title' => 'Edit',
                'data-toggle' => 'tooltip'
            ]);
        },
        'delete' => function ($url, $model) {
            return Html::a('<i class="fas fa-trash-alt"></i> Delete', $url, [
                'class' => 'delete-btn',
                'title' => 'Delete',
                'data-toggle' => 'tooltip',
                'data-confirm' => 'Are you sure you want to delete this item?',
                'data-method' => 'post'
            ]);
        },
    ],
],

        ],
    ]); ?>

</div>

    <?php Pjax::end(); ?>

</div>