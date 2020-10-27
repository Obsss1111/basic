<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Autors */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="autors-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'IdAutor')->textInput() ?>

    <?= $form->field($model, 'IdUser')->textInput() ?>

    <?= $form->field($model, 'NameAutor')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
