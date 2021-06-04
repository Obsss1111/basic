<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\AutoComplete;
use app\models\MusicStyleQuery;
use yii\web\JsExpression;
use app\models\AutorHasMusicQuery;
use app\models\PathMusicQuery;

/* @var $this yii\web\View */
/* @var $model app\models\Music */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="music-form">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name_music')->textInput(['maxlength' => true]) ?>
    
     <div class="form-group">
    <label for="author" class="control-label">Исполнитель</label>
    <?= AutoComplete::widget([
        'name' => 'author',
        'id' => 'author',
        'options' => ['class' => 'form-control'],
        'clientOptions' => [
            'source' => AutorHasMusicQuery::getList(),
            'autoFill' => true,
            'minLength' => '0',
            'select' => new JsExpression("function( event, ui ) {
                $('#autorhasmusic-id_autor').val(ui.item.id);
            }"),
        ]
    ]); ?>
    </div>
    <?= Html::activeHiddenInput($author, 'id_autor'); ?>

    <div class="form-group">
    <label for="name_style" class="control-label">Жанр</label>
    <?= AutoComplete::widget([
        'name' => 'name_style',
        'id' => 'name_style',
        'options' => ['class' => 'form-control'],
        'clientOptions' => [
            'source' => MusicStyleQuery::getList(),
            'autoFill' => true,
            'minLength' => '0',
            'select' => new JsExpression("function( event, ui ) {
                $('#music-music_style_id_style').val(ui.item.id);
            }"),
        ]
    ]); ?>
    <?= Html::activeHiddenInput($model, 'music_style_id_style'); ?>
    </div>
    
     <div class="form-group">
    <label for="track_path" class="control-label">Путь к файлу</label>
    <?= AutoComplete::widget([
        'name' => 'track_path',
        'id' => 'track_path',
        'options' => ['class' => 'form-control'],
        'clientOptions' => [
            'source' => PathMusicQuery::getList(),
            'autoFill' => true,
            'minLength' => '0',
            'select' => new JsExpression("function( event, ui ) {
                $('#music-path_music_id_path').val(ui.item.id);
            }"),
        ]
    ]); ?>
    <?= Html::activeHiddenInput($model, 'path_music_id_path'); ?>
    </div>
    
   
   
    <?= $form->field($file, 'musicFile')->fileInput()->label('Файл') ?>    
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => 'btn btn-success']); ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
