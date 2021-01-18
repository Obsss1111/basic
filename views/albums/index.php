<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\grid\DataColumn;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\AlbumsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="albums-index">

   

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout' => "{items}\n{pager}",
        'columns' => [
            [
                'class' => DataColumn::className(),
                'attribute' => 'name_album',
                'value' => function($model, $key, $index, $column) {
                    $content = Html::img('http://basic/assets/img/pepegaDance.gif', ['class' => 'images-albums']);
                    $content .= Html::tag('p', Html::encode($model->name_album), ['class' => 'name-albums']);
                    return Html::a($content, Url::to([
                        '/albums/view', 
                        'id_album' => $model->id_album, 
                        'autor_id_autor' => $model->autor_id_autor
                        ]),
                        ['class' => 'album-flex']
                    );
                },
                'format' => 'raw',
                
            ],
        ],
    ]); ?>


</div>
