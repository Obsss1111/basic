<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\DataColumn;
use yii\helpers\Url;

?>
<div class="autor-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout' => "{items}\n{pager}",
        'columns' => [
            [
                'class' => DataColumn::className(),
                'attribute' => 'name_autor',
                'format' => 'raw',
                'value' => function($model, $key, $index){
                    return Html::a(Html::encode($model->name_autor), Url::to(['/autor/view', 'id' => $model->id_autor]));
                },
            ],
        ],
    ]); ?>


</div>
