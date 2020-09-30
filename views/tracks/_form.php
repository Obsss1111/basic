<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tracks */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tracks-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Id')->textInput() ?>

    <?= $form->field($model, 'Name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Autor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Duration')->textInput() ?>

    <?= $form->field($model, 'PathTrack')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
