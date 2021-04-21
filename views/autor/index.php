<?php

use yii\helpers\Html;

$color = ['warm', 'bighead', 'orange-fun', 'hazel'];
?>
<div class="autor-index">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach ($dataProvider->getModels() as $model) { ?>
        <?php if ($model->countTracks): ?>
        <div class="col" style="margin-bottom: 20px;">
            <div class="card h-100 mb-3 bg-album" style="max-width: 20rem; max-height: 20rem;">
                <?php if ($model->img) { ?>
                    <img src="<?= 'http://basic/assets/img/'.$model->img ?>" class="card-img-top">               
                <?php } else { ?>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person-fill <?= $color[random_int(0, 3)] ?>" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    </svg>
                <?php } ?>
                <div class="card-body">
                    <h5 class="card-title">
                        <?=Html::a(Html::encode($model->name), ['/autor/view', 'id' => $model->id], 
                            ['class' => 'text-warning text-decoration-none'])?>
                    </h5>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Музыкальных треков: <?= $model->countTracks?></small>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php } ?>
    </div>
</div>
