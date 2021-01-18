<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\modules\ActionButtons;
use yii\bootstrap\ButtonGroup;
use yii\bootstrap\Tabs;
use yii\grid\DataColumn;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MusicSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Музыка';
$this->params['breadcrumbs'][] = $this->title;
?>

    <h1 style="margin-left: 10px;"><?= Html::encode($this->title) ?></h1>
    <?php if(Yii::$app->user->id === 1) { ?>
    <div style="text-align: right;">
            <?= Html::a('Добавить музыку', ['create'], ['class' => 'btn btn-success']) ?>
    </div>
    <?php } ?>

<div class="music-index">
    <div class="left-content">

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
                    'options' => ['style' => 'width: 50px;'],
                ],
                [
                    'class' => DataColumn::className(),
                    'attribute' => 'name_music',
                    'value' => function ($model, $key, $index, $column) {
                        return Html::a(Html::encode($model->name_music), Url::to(['/music/view', 'id' => $key, 'id_music' => $model->id_music]));
                    },
                    'format' => 'raw',
                    
                ],
                [
                    'attribute' => 'name_style',
                    'options' => ['width' => 100]
                ],
                [
                    'attribute' => 'duration',
                    'options' => ['width' => 100]
                ],
                [
                    'class' => DataColumn::className(),
                    'attribute' => 'autor_name_autor',
                    'format' => 'raw',
                    'options' => ['width' => 180],
                    'value' => function ($model, $key, $index, $column) {
                        return Html::a(Html::encode($model->autor_name_autor), Url::to(['/autor/view', 'id' => $model->autor_id_autor]));
                    },
                ],
                [
                    'class' => ActionButtons::className(),
                    'options' => ['width' => 115]
                ],
            ],
        ]); ?>

        <?php Pjax::end(); ?>

    </div>
    <div class="right-content">
        <?= Tabs::widget([
            'items' => [
                [
                    'label' => "Исполнители",
                    'content' => $this->render('/autor/index', [
                        'dataProvider' => $dataProviderAutor,
                        'filterModel' => $searchModelAutor,
                    ]),
                    'active' => true
                ],
                [
                    'label' => 'Альбомы',
                    'content' => $this->render('/albums/index', [
                        'dataProvider' => $dataProviderAlbum,
                        'filterModel' => $searchModelAlbum,
                    ]),
                    'headerOptions' => [],
                    'options' => ['id' => 'albumsGridView'],
                ],
                [
                    'label' => 'Любимое',
                    'items' => [
                        [
                            'label' => 'Любимая музыка',
                            'content' => $this->render('/favorite-music/index',[
                                'dataProvider' => $dataProviderFavoriteMusic,
                                'filterModel' => $searchModelFaloriteMusic,
                            ])
                        ],
                        [
                            'label' => 'Любимая альбомы',
                            'content' => $this->render('/favorite-albums/index', [
                                'dataProvider' => $dataProviderFavoriteAlbum,
                                'filterModel' => $searchModelFavoriteAlbum,
                            ]),
                        ],
                        [
                            'label' => 'Любимые исполнители',
                            'content' => 'DropdownB, Anim pariatur cliche...',
                        ],
                        [
                            'label' => 'Новое',
                            'content' => 'В разработке'
                        ],
                    ],
                   
                ],
            ],
        ]);
        ?>        
    </div>
</div>
<?php 
$url_music = '';
$name_music = '';
$html = Html::beginTag('div', ['class' => 'player']);
$html .= Html::label($name_music , 'audio_player', ['style' => 'text-align:center;', 'id' => 'label_play']);
$html .= Html::tag('br');
$html .= Html::beginTag('audio', 
        [
            'id' => 'audio_player', 
            'style' => 'width: 95%; margin: 10px 10px;', 
            'controls' => true, 
            'preload' => 'auto', 
            'loop' => true,
        ]);
$html .= Html::tag('track', '',['label' => 'Русский']);
$html .= Html::tag('track', '',['label' => 'English']);
$html .= Html::tag('track', '',['label' => 'Franch']);
$html .= Html::tag('source', '', [/*'src' => $url_music,*/ 'type' => 'audio/ogg']);
$html .= Html::tag('source', '', [/*'src' => $url_music,*/ 'type' => 'audio/mpeg']);
$html .= Html::endTag('audio');
$html .= Html::endTag('div');
echo $html;

$this->registerJsFile('/assets/js/music.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
?>