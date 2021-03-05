<?php

namespace app\controllers;

use Yii;
use app\models\AlbumsMusic;
use app\models\AlbumsMusicSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AlbumsMusicController implements the CRUD actions for AlbumsMusic model.
 */
class AlbumsMusicController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all AlbumsMusic models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AlbumsMusicSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AlbumsMusic model.
     * @param integer $id_autor_music
     * @param integer $id_music_albums
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_autor_music, $id_music_albums)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_autor_music, $id_music_albums),
        ]);
    }

    /**
     * Creates a new AlbumsMusic model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AlbumsMusic();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_autor_music' => $model->id_autor_music, 'id_music_albums' => $model->id_music_albums]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AlbumsMusic model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_autor_music
     * @param integer $id_music_albums
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_autor_music, $id_music_albums)
    {
        $model = $this->findModel($id_autor_music, $id_music_albums);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_autor_music' => $model->id_autor_music, 'id_music_albums' => $model->id_music_albums]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AlbumsMusic model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_autor_music
     * @param integer $id_music_albums
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_autor_music, $id_music_albums)
    {
        $this->findModel($id_autor_music, $id_music_albums)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AlbumsMusic model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_autor_music
     * @param integer $id_music_albums
     * @return AlbumsMusic the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_autor_music, $id_music_albums)
    {
        if (($model = AlbumsMusic::findOne(['id_autor_music' => $id_autor_music, 'id_music_albums' => $id_music_albums])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
