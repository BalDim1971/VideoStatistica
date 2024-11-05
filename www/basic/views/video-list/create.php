<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\VideoList $model */

$this->title = 'Create Video List';
$this->params['breadcrumbs'][] = ['label' => 'Video Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
