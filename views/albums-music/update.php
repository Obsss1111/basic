<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AlbumsMusic */

$this->title = 'Update Albums Music: ' . $model->id_autor_music;
$this->params['breadcrumbs'][] = ['label' => 'Albums Musics', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_autor_music, 'url' => ['view', 'id_autor_music' => $model->id_autor_music, 'id_music_albums' => $model->id_music_albums]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="albums-music-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
