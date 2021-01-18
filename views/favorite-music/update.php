<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FavoriteMusic */

$this->title = 'Update Favorite Music: ' . $model->music_id_music;
$this->params['breadcrumbs'][] = ['label' => 'Favorite Musics', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->music_id_music, 'url' => ['view', 'music_id_music' => $model->music_id_music, 'user_id' => $model->user_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="favorite-music-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
