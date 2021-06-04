<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Music */

$this->title = 'Update Music: ' . $model->id_music;
$this->params['breadcrumbs'][] = ['label' => 'Musics', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_music, 'url' => ['view', 'id' => $model->id_music]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="music-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'file' => $file,
        'author' => $author,
    ]) ?>

</div>
