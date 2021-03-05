<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <?php $this->registerJsFile('/assets/js/music.js', ['depends' => [\yii\web\JqueryAsset::className()]]); ?>
    
</head>
<body>
    <?php $this->beginBody() ?>

    <div class="wrap">
        <?php
        NavBar::begin([
            'brandLabel' => 'Триумф',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar navbar-dark navbar-expand-lg',
                'style' => "background-color: #222;"
            ],
        ]);
        $menuItems = [
            ['label' => 'Главная', 'url' => ['/site/index']],
            ['label' => 'Музыка', 'url' => ['/music/index']],
            ['label' => 'Любимая музыка', 'url' => ['/music/my-music']]
        ];
        if (Yii::$app->user->isGuest) {
            $dropDown = Html::a('Регистрация', ['/site/signup'], ['class' => 'dropdown-item']) .
                        Html::a('Авторизация', ['/site/login'], ['class' => 'dropdown-item']);
        } else {
            $dropDown = Html::a('Личный кабинет', ['/user/index'], ['class' => 'dropdown-item'])
                        . Html::beginForm(['/site/logout'], 'post')
                        . Html::submitButton(
                            'Выход (' . Yii::$app->user->identity->username . ')',
                            ['class' => 'btn dropdown-item']
                        )
                        . Html::hiddenInput('label', Yii::$app->user->id, ['id' => 'username'])
                        . Html::endForm();            
        }
        $menuItems[] = '<li class="nav-item dropdown">'
                . Html::a(Yii::$app->user->isGuest ? 'Профиль' : "(".Yii::$app->user->identity->username.")", '#', [
                    'id' => 'navbarDropdownMenuLink',
                    'class' => 'nav-link dropdown-toggle',
                    'data-toggle' => 'dropdown',
                    'aria-haspopup' => true,
                    'aria-expanded' => false,
                ])  
                . Html::beginTag('div', [
                    'class' => 'dropdown-menu',
                    'aria-labelledby' => 'navbarDropdownMenuLink',
                ])
                . $dropDown
                . Html::endTag('div')
                . '</li>';
        
        echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => $menuItems,
        ]);          
        NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>            
            <?= $content ?>
        </div>
    </div>
    <?php $options = ['class' => 'footer', 'style' => 'z-index: 1000; position: fixed;']; 
    if ($this->title != 'Главная страница') {    
        $options['style'] .= " margin-top: 30px;";    
    }
    ?>
    <?= Html::beginTag('footer', $options) ?>
    <?php if ($this->title == 'Главная страница') { ?>    
            <div class="container">
                <div class="row row-cols-2">
                <div class="col col-sm-9">
                    <p>&copy; Смоленцев Д.Е. Выпускная квалификационная работа 2020-<?= date('Y') ?></p>
                </div>
                    <div class="col col-sm-3" style="text-align: right;">
                    <p><?= Yii::powered() ?></p>
                </div>
                </div>
            </div>
    <?php } else { ?>
            <div class="player">
                <label id="label_play" style="text-align:center;" for="audio_player"></label>
                <br>
                <audio id="audio_player" style="width: 95%; margin: 10px 10px;" controls preload="auto" loop>
                    <source src="" type="audio/ogg">
                    <source src="" type="audio/mpeg">
                </audio>
            </div>
    <?php } ?>
    <?= Html::endTag('footer') ?>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
