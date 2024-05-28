<?php

namespace app\controllers;

use Yii;
use app\models\Act;
use app\models\Dboard;
use app\models\DboardSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;


/**
 * DboardController implements the CRUD actions for Dboard model.
 */
class DboardController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }
        public function beforeAction($action)
    {
        if (\Yii::$app->user->isGuest && $action->controller->id !== 'site' && $action->id !== 'login') {
            \Yii::$app->response->redirect(['site/login']);
            return false;
        }
        return true;
    }


    /**
     * Lists all Dboard models.
     *
     * @return string
     */
public function actionIndex()
{
    $searchModel = new DboardSearch();
    $dataProvider = $searchModel->search($this->request->queryParams);
    
    // добавляем объединение с моделью Act
    $dataProvider->query->joinWith('act');

    return $this->render('index', [
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
    ]);
}

    /**
     * Displays a single Dboard model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Dboard model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    #public function actionCreate()
    #{
    #    $model = new Dboard();
#
 #       if ($this->request->isPost) {
  #          if ($model->load($this->request->post()) && $model->save()) {
  #              return $this->redirect(['view', 'id' => $model->id]);
  #          }
  #      } else {
  #          $model->loadDefaultValues();
  #      }
#
#        return $this->render('create', [
#            'model' => $model,
 #       ]);
 #   }
 
 public function actionCreate()
{
    $dboard = new Dboard();
    $act = new Act();

    if ($dboard->load(Yii::$app->request->post()) && $act->load(Yii::$app->request->post())) {
        if ($dboard->validate() && $act->validate()) {
            $dboard->save(false);
            $act->dboard_id = $dboard->id;
            $act->save(false);
            return $this->redirect(['/']);
        }
    }

    return $this->render('create', [
        'dboard' => $dboard,
        'act' => $act,
    ]);
}

    /**
     * Updates an existing Dboard model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
 public function actionUpdate($id)
{
    $model = $this->findModel($id);
    $act = $model->act; // загрузить объект Act, связанный с моделью Dboard

    if ($this->request->isPost && $model->load($this->request->post()) && $act->load($this->request->post()) && $model->save() && $act->save()) {
        return $this->redirect(['/']);
    }

    return $this->render('update', [
        'dboard' => $model,
        'act' => $act,
    ]);
}


    /**
     * Deletes an existing Dboard model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Dboard model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Dboard the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Dboard::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
