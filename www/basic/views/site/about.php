<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'О сайте';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        Описание программы.<br>
        Можно изменять описание в файле:
    </p>

    <code><?= __FILE__ ?></code>
</div>
