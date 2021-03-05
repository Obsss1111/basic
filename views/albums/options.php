<?php
use yii\helpers\Html;

?>
    <div class="card text-dark bg-light mb-3 h-100" style="width: 15rem;">
       <div class="card-header">Режим администратора</div>
       <div class="card-body"> 
           <h5 class="card-title">Опции</h5>
           <div class="card-text list-group btn-group-vertical">                               
                <?= Html::a('Редактировать', ['update', 'id' => $model->id_album], ['class' => 'btn btn-primary']) ?>                                                                   
                <?= Html::a('Удалить', ['delete', 'id' => $model->id_album], 
                        [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => "Вы действительно хотите удалить $this->title?",
                                'method' => 'post',
                        ],
                ]) ?>
          </div>
      </div>
   </div>