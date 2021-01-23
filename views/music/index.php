<?php

use yii\helpers\Html;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MusicSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Музыка';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1 style="margin-left: 10px;"><?= Html::encode($this->title) ?></h1>    

<div class="music-index">
    <div class="container">
        <div class="row">
            <div class='col'>
                <?php if(Yii::$app->user->id === 1) { 
                    echo Html::a('Добавить музыку', ['create'], ['class' => 'btn btn-success']);
                } ?>
            </div>
            <div class="col">
                <?= Tabs::widget([
                    'items' => [
                        [
                            'label' => 'Новое',
                            'content' => $this->render('/music/music', [
                                'dataProvider' => $dataProvider,
                                'filterModel' => $searchModel
                            ]),
                            'active' => true
                        ],
                        [
                            'label' => "Исполнители",
                            'content' => $this->render('/autor/index', [
                                'dataProvider' => $dataProviderAutor,
                                'filterModel' => $searchModelAutor,
                            ]),
                        ],
                        [
                            'label' => 'Альбомы',
                            'content' => $this->render('/albums/index', [
                                'dataProvider' => $dataProviderAlbum,
                                'filterModel' => $searchModelAlbum,
                            ]),
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
                            ],

                        ],
                    ],
                ]);
                ?>  
            </div>
        </div>
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