<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\VideoWork $model */

$this->title = 'Create Video Work';
$this->params['breadcrumbs'][] = ['label' => 'Video Works', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-work-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
