<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\VideoWork $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="video-work-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'video_id')->textInput() ?>

    <?= $form->field($model, 'time_start')->textInput() ?>

    <?= $form->field($model, 'time_stop')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
