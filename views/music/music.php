<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\modules\ActionButtons;
use yii\grid\DataColumn;
use yii\helpers\Url;
use yii\grid\SerialColumn;
?>

<div class="music-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $filterModel,
        'layout' => "{items}\n{pager}",
        'tableOptions' => ['class' => 'table table-hover table-sm table-borderless container'],        
        'columns' => [
            ['class' => SerialColumn::className()],
            [
                'class' => DataColumn::className(),
                'attribute' => 'name_music',
                'value' => function ($model, $key, $index, $column) {
                    return Html::a(
                        ucfirst($model->name_music), 
                        ['/music/view', 'id' => $key, 'id_music' => $model->id_music]
                    );
                },
                'format' => 'raw',
            ],
            [
                'attribute' => 'styleName',
                'label' => 'Стиль',
                'value' => 'rel_style.name_style',
            ],            
            [
                'attribute' => 'autorName',//'autor_name_autor',
                'format' => 'raw',
                'label' => 'Исполнитель',
                'value' => function ($model, $key, $index, $column) {
                    return Html::a(Html::encode($model->rel_autor->name_autor), ['/autor/view', 'id' => $model->rel_autor->id_autor]);
                },
            ],
            ['class' => ActionButtons::className(), 'options' => ['style' => 'width: 150px;']],
        ],
    ]); ?>
</div>
