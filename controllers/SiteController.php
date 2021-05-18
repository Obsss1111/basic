<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\EntryForm;
use app\models\User;
use app\models\SignupForm;
use yii\helpers\Html;
use app\models\UploadForm;
use yii\web\UploadedFile;

class SiteController extends Controller
{
    
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['login', 'logout', 'signup'],
                'denyCallback' => function ($rule, $action) {
                    throw new \Exception('У вас нет доступа к этой странице');
                },
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['login', 'signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $color = ['warm', 'bighead', 'orange-fun', 'hazel'];
        $carousel = [
            [
               'content' => '<svg xmlns="http://www.w3.org/2000/svg" width="20rem" height="20rem" fill="currentColor" class="bi bi-music-note" viewBox="0 0 16 16">
                    <path d="M9 13c0 1.105-1.12 2-2.5 2S4 14.105 4 13s1.12-2 2.5-2 2.5.895 2.5 2z"/>
                    <path fill-rule="evenodd" d="M9 3v10H8V3h1z"/>
                    <path d="M8 2.82a1 1 0 0 1 .804-.98l3-.6A1 1 0 0 1 13 2.22V4L8 5V2.82z"/>
                </svg>',
               'caption' => '<h1>'.
                Html::a(Html::encode('Популярные треки'),
                        ['music/index'],
                        ['class' => 'text-decoration-none text-light'])
                .'</h1>',
               'options' => ['class' => $color[random_int(0, 3)]],
            ],
            [
               'content' => '<svg xmlns="http://www.w3.org/2000/svg" width="20rem" height="20rem" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    </svg>',
               'caption' => '<h1>'.
                Html::a(Html::encode('Популярные исполнители'),
                        ['/music/index', '#' => 'w1-tab1'],
                        ['class' => 'text-decoration-none text-light'])
                .'</h1>',
               'options' => ['class' => $color[random_int(0, 3)]],
            ],
            [
               'content' => '<svg xmlns="http://www.w3.org/2000/svg" style="padding: 5px; width:20rem; height:20rem;"  fill="currentColor" class="bi bi-vinyl-fill card-img" viewBox="0 0 16 16">
                                            <path d="M8 6a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm0 3a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4 8a4 4 0 1 0 8 0 4 4 0 0 0-8 0z"/>
                                        </svg>',
               'caption' => '<h1>'.
                Html::a(Html::encode('Популярные альбомы'),
                        ['music/index'],
                        ['class' => 'text-decoration-none text-light'])
                .'</h1>',
               'options' => ['class' => $color[random_int(0, 3)]],
            ],
        ];
        return $this->render('index', ['carousel' => $carousel]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    //свой пример
    public function actionSay($message = 'Привет')
    {
        return $this->render('say',['message' => $message]);
    }
    
    public function actionEntry() {
        $model = new EntryForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // данные в $model удачно проверены
            // делаем что-то полезное с $model ...
            return $this->render('entry-confirm', ['model' => $model]);
        } else {
            // либо страница отображается первый раз, либо есть ошибка в данных
            return $this->render('entry', ['model' => $model]);
        }
    }
    
    public function actionAddAdmin() {
        $model = User::find()->where(['username' => 'demo'])->one();
        if (empty($model)) {
            $user = new User();
            $user->username = 'demo';
            $user->email = 'demo@list.ru';
            $user->setPassword('demo');
            $user->generateAuthKey();
            if ($user->save(false)) {
                echo 'good';
            }
        }
    }
    
    public function actionSignup()
    {
        $model = new SignupForm();
 
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }
 
        return $this->render('signup', [
            'model' => $model,
        ]);
    }
    
    /**
     * Страница для загрузки файлов
     * @return url
     */
    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            if ($model->upload()) {
                // file is uploaded successfully
                return $this->render('/user/index');
            }
        }

        return $this->render('upload', ['model' => $model]);
    }
}
