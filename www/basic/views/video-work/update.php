<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\VideoWork $model */

$this->title = 'Update Video Work: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Video Works', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="video-work-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
