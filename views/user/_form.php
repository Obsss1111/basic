<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'IdUser')->textInput() ?>

    <?= $form->field($model, 'Login')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FavoriteMusic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FavoriteAlbum')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FavoriteStyleMusic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FavoriteAutor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FavoriteStyle')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
