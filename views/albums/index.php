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
        'tableOptions' => ['class' => 'table table-hover'],
        'columns' => [
            [
                'class' => DataColumn::className(),
                'attribute' => 'name_album',
                'format' => 'raw',
                'options' => ['class' => 'row'],
                'value' => function($model, $key, $index, $column) {
                    $btn_options = [
                        'class' => 'btn btn-light col',
                        'onclick' => 'albumPlay(this)',
                    ];
                    $url_options = [
                        '/albums/view', 
                        'id_album' => $model->id_album, 
                        'autor_id_autor' => $model->autor_id_autor
                    ];
                    $html = Html::beginTag('div').
                            Html::button(Html::img('http://basic/assets/img/pepegaDance.gif', ['class' => 'images-albums']), $btn_options).
                            Html::a(Html::encode($model->name_album), Url::to($url_options), ['class' => 'col']).
                            Html::endTag('div');
                    return $html;
                },                
            ],
        ],
    ]); ?>


</div>
