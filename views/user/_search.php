<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'IdUser') ?>

    <?= $form->field($model, 'Login') ?>

    <?= $form->field($model, 'Password') ?>

    <?= $form->field($model, 'FavoriteMusic') ?>

    <?= $form->field($model, 'FavoriteAlbum') ?>

    <?php // echo $form->field($model, 'FavoriteStyleMusic') ?>

    <?php // echo $form->field($model, 'FavoriteAutor') ?>

    <?php // echo $form->field($model, 'FavoriteStyle') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
