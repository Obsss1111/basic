<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AlbumsMusicSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Albums Musics';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="albums-music-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Albums Music', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_albums_music',
            'id_autor_music',
            'id_music_albums',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
