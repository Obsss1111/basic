<?php

use yii\grid\GridView;
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
            <div class="col-sm">
                <div class="card w-auto" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Популярная музыка</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="card w-auto" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Популярные исполнители</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            
            <div class="col-sm">
               <div class="card w-auto" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Популярные жанры</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
