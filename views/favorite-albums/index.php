<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\DataColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FavoriteAlbumsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="favorite-albums-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout' => "{items}\n{pager}",
        'tableOptions' => ['class' => 'table table-hover table-sm table-borderless container'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_fav_album',
            [
                'class' => DataColumn::className(),
                'attribute' => 'albums_id_album',
                'value' => function($model, $key, $index){
                    return $model->albumsIdAlbum->name_album;
                }
            ],

        ],
    ]); ?>


</div>
