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
        'filterModel' => $filterModel,
        'layout' => "{items}\n{pager}",
        'tableOptions' => ['class' => 'table table-hover table-sm table-borderless container'],
        'rowOptions' => [
            'class' => "card text-dark bg-light mb-3",
//            'style' => "max-width: 540px;",
        ],
        'caption' => 'Новые альбомы',
        'showHeader' => false,
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
                    $html = Html::beginTag('div', ['class' => 'row g-0']).
                            Html::beginTag('div', ['class' => 'col-md-4']).
                            Html::button(
                                    Html::img('http://basic/assets/img/pepegaDance.gif', [
                                        'class' => 'images-albums'
                                    ]),
                                    $btn_options
                            ).
                            Html::endTag('div').
                            Html::beginTag('div', ['class' => 'col-md-8']).
                            Html::beginTag('div', ['class' => "card-body"]).
                            Html::beginTag('h5', ['class' => 'card-title']).
                            Html::a(Html::encode($model->name_album), Url::to($url_options)).
                            Html::endTag('h5').
                            "<p class='card-text'>".
                            Html::a($model->rel_autor->name_autor, Url::to(['/autor/view', 'id' => $model->autor_id_autor])).
                            "</p>
                            <p class='card-text'><small class='text-muted'>Last updated 3 mins ago</small></p>".
                            Html::endTag('div').
                            Html::endTag('div').
                            Html::endTag('div').
                            Html::endTag('div');                            
                    return $html;
                },                
            ],
        ],
    ]); ?>
</div>
