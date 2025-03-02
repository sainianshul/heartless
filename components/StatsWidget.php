<?php

namespace app\components;

use yii\base\Widget;

class StatsWidget extends Widget
{
    public $title;
    public $value;
    public $icon;
    public $color;

    public function run()
    {
        return $this->render('@app/views/components/stats-widget-default', [
            'title' => $this->title,
            'value' => $this->value,
            'icon' => $this->icon,
            'color' => $this->color,
        ]);
    }
}
