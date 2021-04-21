<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Breadcrumbs;
use app\assets\AppAsset;
use app\modules\Options;
use app\services\AccessService;

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
            ['label' => 'Моя музыка', 'url' => ['/music/my-music']]
        ];
        if (Yii::$app->user->isGuest) {
            $dropDown = [
                ['label' => 'Регистрация', 'url' => ['/site/signup']],
                ['label' => 'Авторизация', 'url' => ['/site/login']]
            ];
        } else {
            $dropDown = [
                ['label' => 'Личный кабинет', 'url' => ['/user/index']],
                Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton('Выход', ['class' => 'btn dropdown-item'])
                . Html::hiddenInput('label', Yii::$app->user->id, ['id' => 'username'])
                . Html::endForm(),
            ];
        }

        $menuItems[] = [
            'label' => Yii::$app->user->isGuest ? 'Профиль' : Yii::$app->user->identity->username,
            'items' => $dropDown,
        ];
        
        echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => $menuItems,
        ]);          
        NavBar::end();
        ?>

        <div class="container mb-4">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>                                         
            
                <div class="row">
                    <?php if (isset($this->params['menu']) && AccessService::hasAccess()): ?>
                    <div class='col-md-10'><?= $content ?></div>
                    <div class="col-md-2">
                        <?= Options::widget([
                            'items' => isset($this->params['menu']) ? $this->params['menu'] : [],
                            'itemOptions' => ['class' => 'list-group-item list-group-item-action'],
                            'titleOptions' => ['class' => 'active']
                        ]); ?>
                    </div>
                    <?php else: ?>
                    <div class="col"><?= $content ?></div>
                    <?php endif; ?>
                </div> 
                  
        </div>
    </div>
    <?php if ($this->title == 'Главная страница'): ?> 
        <footer class="footer fixed-bottom">   
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
        </footer>
    <?php else: ?> 
        <footer class="fixed-bottom">
            <div class="container mt-5">
                <div class="player">
                    <label id="label_play" style="text-align:center;" for="audio_player"></label>
                    <br>
                    <audio id="audio_player" style="width: 95%; margin: 10px 10px;" controls preload="auto" loop/> 
                </div>   
            </div>
        </footer>
    <?php endif; ?>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
