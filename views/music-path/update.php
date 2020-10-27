<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MusicPath */

$this->title = 'Update Music Path: ' . $model->IdMusicPath;
$this->params['breadcrumbs'][] = ['label' => 'Music Paths', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdMusicPath, 'url' => ['view', 'id' => $model->IdMusicPath]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="music-path-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
