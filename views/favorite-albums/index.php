<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FavoriteAlbumsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="favorite-albums-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout' => "{items}\n{pager}",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_fav_album',
            'user_id',
            'albums_id_album',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
