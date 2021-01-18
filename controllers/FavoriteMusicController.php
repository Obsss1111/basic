<?php

namespace app\controllers;

use Yii;
use app\models\FavoriteMusic;
use app\models\FavoriteMusicSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FavoriteMusicController implements the CRUD actions for FavoriteMusic model.
 */
class FavoriteMusicController extends Controller
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
     * Lists all FavoriteMusic models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FavoriteMusicSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FavoriteMusic model.
     * @param integer $music_id_music
     * @param integer $user_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($music_id_music, $user_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($music_id_music, $user_id),
        ]);
    }

    /**
     * Creates a new FavoriteMusic model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FavoriteMusic();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'music_id_music' => $model->music_id_music, 'user_id' => $model->user_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing FavoriteMusic model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $music_id_music
     * @param integer $user_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($music_id_music, $user_id)
    {
        $model = $this->findModel($music_id_music, $user_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'music_id_music' => $model->music_id_music, 'user_id' => $model->user_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing FavoriteMusic model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $music_id_music
     * @param integer $user_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($music_id_music, $user_id)
    {
        $this->findModel($music_id_music, $user_id)->delete();

        return $this->redirect(['index']);
    }
    
    public function actionHeartMusic($music_id_music, $user_id) {
        $newFavoriteMusic = new FavoriteMusic();
        $newFavoriteMusic->addLikedMusic($music_id_music, $user_id);
        return json_encode($newFavoriteMusic->attributes);
    }

    /**
     * Finds the FavoriteMusic model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $music_id_music
     * @param integer $user_id
     * @return FavoriteMusic the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($music_id_music, $user_id)
    {
        if (($model = FavoriteMusic::findOne(['music_id_music' => $music_id_music, 'user_id' => $user_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
