<?php
use yii\bootstrap4\Html;
use yii\bootstrap4\Tabs;

$this->title = 'Моя музыка';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="my-music">
    <div class="container">
        <h1><?= Html::encode($this->title) ?></h1> 
        <div class="row">
                <?= Tabs::widget([
                    'navType' => 'flex-column nav-pills mb-3 col-md-2',
                    'tabContentOptions' => ['class' => 'col-md'],
                    'items' => [
                        [
                            'label' => 'Моя музыка',
                            'content' => $this->render('/favorite-music/index',[
                                    'dataProvider' => $dataProviderFavoriteMusic,
                                    'filterModel' => $searchModelFaloriteMusic,
                            ]),
                        ],
                        [
                            'label' => 'Исполнители',
                            'content' => $this->render('/autor/favorite-author', [
                                'dataProvider' => $dataProviderFavoriteAuthor,
                            ]),
                        ],
                        [
                            'label' => 'Альбомы',
                            'content' => $this->render('/albums/favorite-albums', [
                                'dataProvider' => $dataProviderFavoriteAlbum,
                                'filterModel' => $searchModelFavoriteAlbum,
                            ]),
                        ]
                    ]
                ]); ?>                   
        </div>            
    </div>    
</div>


