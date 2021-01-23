<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\modules\ActionButtons;
use yii\grid\DataColumn;
use yii\helpers\Url;
?>

<?php Pjax::begin(); ?>
<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'layout' => "{items}\n{pager}",
    'columns' => [
        [
            'class' => DataColumn::className(),
            'attribute' => 'id_music',
            'label' => '#',
            'value' => function($model, $key, $index) {
                return $index+1;
            }
        ],
        [
            'class' => DataColumn::className(),
            'attribute' => 'name_music',
            'value' => function ($model, $key, $index, $column) {
                return Html::a(Html::encode($model->name_music), Url::to(['/music/view', 'id' => $key, 'id_music' => $model->id_music]));
            },
            'format' => 'raw',

        ],
        'name_style',
        [
            'class' => DataColumn::className(),
            'attribute' => 'autor_name_autor',
            'format' => 'raw',
            'value' => function ($model, $key, $index, $column) {
                return Html::a(Html::encode($model->autor_name_autor), Url::to(['/autor/view', 'id' => $model->autor_id_autor]));
            },
        ],
        [
            'class' => ActionButtons::className(),
        ],
    ],
]); ?>

<?php Pjax::end(); ?>

