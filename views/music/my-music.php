<?php
use yii\helpers\Html;
use yii\bootstrap\Tabs;

$this->title = 'Любимая музыка';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="my-music">
    <div class="container">
        <div class="row">
            <div class="col">
                <?= Tabs::widget([
                    'items' => [                        
                        [
                            'label' => 'Любимая музыка',
                            'content' => $this->render('/favorite-music/index',[
                                'dataProvider' => $dataProviderFavoriteMusic,
                                'filterModel' => $searchModelFaloriteMusic,
                            ]),
                            'active' => true,
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
                ]);
                ?>  
            </div>
        </div>
    </div>    
</div>

