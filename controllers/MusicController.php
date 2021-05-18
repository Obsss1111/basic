<?php

namespace app\controllers;

use Yii;
use app\models\Music;
use app\models\MusicSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\AutorSearch;
use app\models\AlbumsSearch;
use app\models\FavoriteAlbumsSearch;
use app\models\FavoriteMusicSearch;
use app\models\MusicRepository;
use app\services\AccessService;
use app\models\FavoriteMusic;
use app\models\FavoriteAuthorsSearch;

/**
 * MusicController implements the CRUD actions for Music model.
 */
class MusicController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
//                'only' => ['login', 'logout', 'signup', 'index', 'view', 'create', 'update', 'delete'],
//                'denyCallback' => function ($rule, $action) {
//                    throw new \Exception('У вас нет доступа к этой странице');
//                },
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'logout', 'my-music', 'playlist', 'heart'],
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
                    'delete' => ['POST', 'DELETE'],
                ],
            ],
        ];
    }

    /**
     * Lists all Music models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->updateIndex();
        
        $searchModel = new MusicSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        $searchModelAutor = new AutorSearch();
        $dataProviderAutor = $searchModelAutor->search(Yii::$app->request->queryParams);
        
        $searchModelAlbum = new AlbumsSearch();
        $dataProviderAlbum = $searchModelAlbum->search(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            
            'dataProviderAutor' => $dataProviderAutor,
            'searchModelAutor' => $searchModelAutor,
            
            'dataProviderAlbum' => $dataProviderAlbum,
            'searchModelAlbum' => $searchModelAlbum,  
            
            'access' => AccessService::hasAccess(),
        ]);
    }
    
    /**
     * Показывает любимую музыку пользователя
     */
    public function actionMyMusic()
    {
        $searchModelFavoriteAlbum = new FavoriteAlbumsSearch();
        $dataProviderFavoriteAlbum = $searchModelFavoriteAlbum->search(Yii::$app->request->queryParams);

        $searchModelFavoriteMusic = new FavoriteMusicSearch();
        $dataProviderFavoriteMusic = $searchModelFavoriteMusic->search(Yii::$app->request->queryParams);
        
        $searchModelFavoriteAuthor = new FavoriteAuthorsSearch(['user_id' => Yii::$app->user->id]);
        $dataProviderFavoriteAuthor = $searchModelFavoriteAuthor->search(Yii::$app->request->queryParams);

        return $this->render('my-music', [
            'dataProviderFavoriteAlbum' => $dataProviderFavoriteAlbum,
            'searchModelFavoriteAlbum' => $searchModelFavoriteAlbum,
            'dataProviderFavoriteMusic' => $dataProviderFavoriteMusic,
            'searchModelFavoriteMusic' => $searchModelFavoriteMusic,
            'dataProviderFavoriteAuthor' => $dataProviderFavoriteAuthor,
            'searchModelFavoriteAuthor' => $searchModelFavoriteAuthor,
        ]);
    }
    
    /**
     * Обновляет данные страницы перед загрузкой
     */
    public function updateIndex() 
    {
        $music_repository = new MusicRepository();
        $music_repository->createListPathMusic();
        $music_repository->createListMusic();
    }

    /**
     * Displays a single Music model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Music model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Music();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_music]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Music model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_music]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    
    /**
     * Создание записи любимой музыки
     * @param string $id
     */
    public function actionHeart($id) 
    {
        $user = Yii::$app->user->id;
        $model = FavoriteMusic::find()->where(['user_id' => $user, 'music_id_music' => $id])->one();
        if (empty($model)) {
            $model = new FavoriteMusic();
            $model->music_id_music = (string) $id;
            $model->user_id = (string) $user;
            $model->save(false);            
            return $model;
        }
    }
    
    /**
     * Удаление записи любимой музыки
     * @param int $id
     */
    public function actionDeleteHeart($id)
    {
        $this->findHeart($id)->delete();
        return $this->refresh();
    }
    
    public function findHeart($id) 
    {
        $user = Yii::$app->user->id;
        return FavoriteMusic::find()->where(['user_id' => $user, 'music_id_music' => $id])->one();
    }

    /**
     * Deletes an existing Music model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    
    /**
     * Выводит плейлист со всеми треками
     */
    public function actionPlaylist() {
        $models = Music::find()->all();
        $list = [];
        foreach ($models as $model) {
            $list[$model->path_music_id_path] = [$model->name_music => $model->rel_path->path];
        }
        return json_encode($list);
    }

    /**
     * Finds the Music model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Music the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Music::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Запрашиваемая страница не найдена.');
    }    
}
