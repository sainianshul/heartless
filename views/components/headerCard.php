<?php

use yii\helpers\Html;

?>

<!-- Header Card -->
<div class="header-card">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h1 class="page-title"><?= Html::encode($title) ?></h1>
        </div>
        <div class="col-md-4 text-md-right">
            <!-- Breadcrumbs -->
            <nav class="custom-breadcrumb">
                <?php if (!empty($breadcrumbs)): ?>
                    <?php foreach ($breadcrumbs as $index => $breadcrumb): ?>
                        <?php if (isset($breadcrumb['url'])): ?>
                            <a href="<?= Yii::$app->urlManager->createUrl($breadcrumb['url']) ?>"><?= Html::encode($breadcrumb['label']) ?></a>
                        <?php else: ?>
                            <span class="current"><?= Html::encode($breadcrumb['label']) ?></span>
                        <?php endif; ?>
                        <?php if ($index !== array_key_last($breadcrumbs)): ?>
                            <span class="separator">›</span>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </nav>
        </div>
    </div>
</div>
