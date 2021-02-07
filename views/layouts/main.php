<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
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
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
//        ['label' => 'Главная', 'url' => ['/site/index']],
        ['label' => 'Музыка', 'url' => ['/music/index']],
        ['label' => 'Любимая музыка', 'url' => ['/music/my-music']]
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Регистрация', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Авторизация', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Выход (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::hiddenInput('label', Yii::$app->user->id, ['id' => 'username'])
            . Html::endForm()
            . '</li>';
        $menuItems[] = ['label' => 'Профиль', 'url' => ['/user/index']];
    }

    echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
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
<?php if ($this->title == 'Главная страница') { ?>
    <footer class="footer">
        <div class="container">        
                <p class="pull-left">&copy; Смоленцев Д.Е. Выпускная квалификационная работа <?= date('Y') ?></p>

                <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>
<?php } else { ?>
    <footer class="footer">
        <div class="player">
            <label id="label_play" style="text-align:center;" for="audio_player"></label>
            <br>
            <audio id="audio_player" style="width: 95%; margin: 10px 10px;" controls preload="auto" loop>
                <source src="" type="audio/ogg">
                <source src="" type="audio/mpeg">
            </audio>
        </div>
    </footer>
<?php } ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
