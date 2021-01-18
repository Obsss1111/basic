<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FavoriteAlbums */

$this->title = 'Update Favorite Albums: ' . $model->id_fav_album;
$this->params['breadcrumbs'][] = ['label' => 'Favorite Albums', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_fav_album, 'url' => ['view', 'id' => $model->id_fav_album]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="favorite-albums-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
