<?php

namespace app\controllers;

use Yii;
use app\models\Autor;
use app\models\AutorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\MusicSearch;
use yii\helpers\Html;
use yii\bootstrap4\Carousel;
use app\models\AutorHasMusicSearch;

/**
 * AutorController implements the CRUD actions for Autor model.
 */
class AutorController extends Controller
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
     * Lists all Autor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AutorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Autor model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $searchModel = new AutorHasMusicSearch(['id_autor' => $id]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model = $this->findModel($id);
        
        $albums = [];
        $color = ['warm', 'bighead', 'orange-fun', 'hazel'];
        $content = '<svg xmlns="http://www.w3.org/2000/svg" style="padding: 20px; width: 40%;" fill="currentColor" class="bi bi-vinyl-fill card-img-top" viewBox="0 0 16 16">
                            <path d="M8 6a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm0 3a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4 8a4 4 0 1 0 8 0 4 4 0 0 0-8 0z"/>
                        </svg>';
        
        foreach ($model->albums as $album) {
            $albums[] = [
                'content' => $content,
                'caption' => Html::a(
                        Html::tag('h1', $album->name_album), 
                        ['albums/view', 'id' => $album->id_album], 
                        ['class' => 'text-light text-decoration-none']),
                'options' => ['class' => $color[random_int(0, 3)]]
            ];
            
        } 

        $carousel = Carousel::widget([
            'items' => $albums,
            'options' => [
                'class' => "carousel slide", 
                'data-bs-ride' => "carousel",
                'style' => 'height: 100%;'
            ],
        ]);   
        
        return $this->render('view', [
            'model' => $model,
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'carousel' => $carousel,
        ]);
    }

    /**
     * Creates a new Autor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Autor();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_autor]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Autor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Autor model.
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
     * Finds the Autor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Autor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Autor::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
