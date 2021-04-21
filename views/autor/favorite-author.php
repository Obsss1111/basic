<?php
use yii\helpers\Html;

$color = ['warm', 'bighead', 'orange-fun', 'hazel'];
?>
<div class="autor-index">    
    <?php if (($models = $dataProvider->getModels())): ?>
        <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach ($models as $model) { ?>
            <?php if ($model->countTracks): ?>
                <div class="col">
                    <div class="card h-100 mb-3 bg-light text-center" style="max-width: 15rem;">
                        <?php if ($model->autor->img) { ?>
                            <img src="<?= 'http://basic/assets/img/'.$model->autor->img ?>" class="card-img-top">
                        <?php } else { ?>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person-fill <?= $color[random_int(0, 3)] ?>" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>
                        <?php } ?>
                        <div class="card-body">
                            <h5 class="card-title">
                                <?= Html::a(Html::encode($model->autor->name), ['/autor/view', 'id' => $model->autor_id], 
                                    ['class' => 'text-warning text-decoration-none'])?>
                            </h5>
                            <p class="card-text">
                                <small class="text-muted">Музыкальных треков: <?= $model->countTracks?></small>
                            </p>
                        </div>                
                    </div>
                </div>        
            <?php endif; ?>
        <?php } ?>
        </div>    
        <?php else: ?>
    <div class="row">
        <div class="col">
            <div class="card bg-light">
                <div class="card-body">
                    <p class="card-text">У вас пока нет записей.</p>
                </div>
            </div>
        </div>
    </div>
        <?php endif; ?>
    
</div>
