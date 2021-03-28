<?php

use yii\bootstrap4\Carousel;
/* @var $this yii\web\View */

$this->title = 'Главная страница';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Добро пожаловать!</h1>  
        <p class="lead">Сайт для любителей музыки и не только.</p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col">
                <?= Carousel::widget([
                    'items' => $carousel,
                    'options' => [
                        'class' => "carousel slide", 
                        'data-bs-ride' => "carousel",   
                    ],
                ]); ?>  
            </div>
        </div>

    </div>
</div>
