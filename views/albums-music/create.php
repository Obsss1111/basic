<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AlbumsMusic */

$this->title = 'Create Albums Music';
$this->params['breadcrumbs'][] = ['label' => 'Albums Musics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="albums-music-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
