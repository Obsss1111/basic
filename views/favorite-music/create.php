<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FavoriteMusic */

$this->title = 'Create Favorite Music';
$this->params['breadcrumbs'][] = ['label' => 'Favorite Musics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="favorite-music-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
