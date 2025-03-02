<?php

namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;
use Yii;

class HeaderCard extends Widget
{
    public $title;
    public $breadcrumbs = [];

    public function run()
    {
        return $this->render('@app/views/components/headerCard', [
            'title' => $this->title,
            'breadcrumbs' => $this->breadcrumbs,
        ]);
    }
}
