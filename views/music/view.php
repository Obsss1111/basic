<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Music */

$this->title = $model->name_music;
$this->params['breadcrumbs'][] = ['label' => 'Музыка', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="music-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php if(Yii::$app->user->id === 1) { ?>
    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id_music], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id_music], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить запись?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_music',
            'name_music',
            'name_style',
            'duration',
            'autor_name_autor',
            'path_music_id_path',
            'music_style_id_style',
            'autor_id_autor',            
        ],
    ]) ?>
    <?php } ?>

</div>
