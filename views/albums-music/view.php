<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AlbumsMusic */

$this->title = $model->id_autor_music;
$this->params['breadcrumbs'][] = ['label' => 'Albums Musics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="albums-music-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_autor_music' => $model->id_autor_music, 'id_music_albums' => $model->id_music_albums], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_autor_music' => $model->id_autor_music, 'id_music_albums' => $model->id_music_albums], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_albums_music',
            'id_autor_music',
            'id_music_albums',
        ],
    ]) ?>

</div>
