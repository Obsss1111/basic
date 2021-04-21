<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap4\LinkPager;
use yii\grid\SerialColumn;
use yii\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AlbumsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$color = ['warm', 'bighead', 'orange-fun', 'hazel'];
?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <?php foreach ($dataProvider->getModels() as $model): ?> 
                <?php if($model->countTracks): ?>            
                    <button type="button" name="album" onclick="albumClick(this)" class="card mb-3 bg-light" id="<?= $model->albums_id_album ?>" style="max-width: 12rem; padding: 0px;">                        
                        <?php if ($model->album->img): ?>
                            <img src="<?= "http://basic/assets/img/{$model->album->img}" ?>" class="card-img-top <?= $color[random_int(0, 3)] ?>" />
                        <?php else: ?>
                            <svg xmlns="http://www.w3.org/2000/svg" style="padding: 5px;" fill="currentColor" class="<?= $color[random_int(0, 3)] ?> bi bi-vinyl-fill card-img-top" viewBox="0 0 16 16">
                                <path d="M8 6a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm0 3a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4 8a4 4 0 1 0 8 0 4 4 0 0 0-8 0z"/>
                            </svg>
                        <?php endif; ?>                                    
                        <div class="card-body">
                            <h5 class="card-title">
                                <?= Html::a(
                                    Html::encode($model->album->name_album), 
                                    ['/albums/view', 'id' => $model->albums_id_album], 
                                    ['class' => 'text-warning text-decoration-none']) 
                                ?>
                            </h5>
                            <p class="card-text">
                                <?= Html::a(
                                        $model->autor->name, 
                                        ['/autor/view', 'id' => $model->autor->id], 
                                        ['class' => 'text-warning text-decoration-none']) 
                                ?>
                            </p>
                            <p class="card-text">
                                <small class="text-muted">Количество треков: <?= $model->countTracks ?></small>
                            </p>
                        </div>                       
                    </button> 
        
                <?php else: ?>
                    <div class="card bg-dark" style="width: 15rem;">
                        <div class="card-body">
                            <p class="card-text">У вас пока нет записей.</p>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
            <?= GridView::widget([
                'options' => ['class' => 'col-md-4'],
                'layout' => "{items}\n{pager}",
                'pager' => ['class' => LinkPager::className()],
                'tableOptions' => ['class' => 'table table-hover table-sm table-borderless container'],
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => SerialColumn::className()],                
                            ['attribute' => 'music.name_music'],
                            [
                                'class' => ActionColumn::className(),
                                'header' => 'Управление',
                                'template' => '{play}{heart}',
                                'buttons' => [
                                    'play' => function($url, $model, $key) {
                                        $icon = Html::tag('span', '', ['class' => 'oi oi-media-play']);
                                        $options = [
                                            'title' => 'play',
                                            'aria-label' => 'play',
                                            'data-pjax' => '0',
                                            'id' => 'play_'.$key,
                                            'name' => 'play',
                                            'value' => $model->music->id_music && $model->music->rel_path->id_path ? $model->music->rel_path->path : $model->music->id_music,                                         
                                            'class' => "btn action-btn",
                                        ];
                                        return Html::button($icon, $options);
                                    },
                                    'heart' => function($url, $model, $key) {
                                        $icon = Html::tag('span', '', ['class' => 'oi oi-heart']);
                                        $options = [
                                            'title' => 'heart',
                                            'aria-label' => 'heart',
                                            'data-pjax' => '0',
                                            'id' => 'heart_'.$key,
                                            'name' => "[heart]",
                                            'value' => $model->music->id_music,
                                            'onclick' => 'heartClick(this)',
                                            'class' => "btn action-btn"
                                        ];
                                        return Html::button($icon, $options);
                                    },
                                ],
                            ],
                ],
            ]); ?>
        
    </div>
</div>


