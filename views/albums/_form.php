<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\AutoComplete;
use app\models\AutorHasMusicQuery;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model app\models\Albums */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="albums-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name_album')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'img')->textInput(['maxlength' => true]) ?>

    <?= AutoComplete::widget([
        'name' => 'author',
        'id' => 'author',
        'options' => ['class' => 'form-control'],
        'clientOptions' => [
            'source' => AutorHasMusicQuery::getList(),
            'autoFill' => true,
            'minLength' => '0',
            'select' => new JsExpression("function( event, ui ) {
                $(this).val(ui.item.id);
            }"),
        ]
    ]);
    Html::hiddenInput('selected_autor');
    ?>
    
    <?= Html::listBox('track_list', null, AutorHasMusicQuery::getAhmList()); ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
