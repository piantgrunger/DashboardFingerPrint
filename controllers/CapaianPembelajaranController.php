<?php

namespace app\controllers;

use app\models\Bahasa;
use Yii;
use app\models\CapaianPembelajaran;
use app\models\CapaianPembelajaranSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CapaianPembelajaranController implements the CRUD actions for CapaianPembelajaran model.
 */
class CapaianPembelajaranController extends Controller
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
     * Lists all CapaianPembelajaran models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CapaianPembelajaranSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CapaianPembelajaran model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
        'model' =>    CapaianPembelajaran::find()->where(['kode'=>$id])->one(),
        ]);
    }

    /**
     * Creates a new CapaianPembelajaran model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CapaianPembelajaran();
        $bahasa = Bahasa::find()->all();
        foreach ($bahasa as $detail) {
 

            $deskripsi[$detail->id_bahasa] ="";
        }
        

        if ($model->load(Yii::$app->request->post())) {
      
            foreach ($bahasa as $detail) {
                $request = Yii::$app->request;
       
                $deskripsi = $request->post('deskripsi-' . $detail->id_bahasa);
               
                if ($deskripsi) {
                    $data = new CapaianPembelajaran();
                    $data->load(Yii::$app->request->post());
                    $data->bahasa = $detail->id_bahasa;
                    $data->deskripsi = $deskripsi;
                    $data->save();
                }
            }
            //$model->save();
            return $this->redirect('index');
        }

        $roles =Yii::$app->user->identity->roleSiakad;
        foreach ($roles as $role) {
            $kodeunit = $role->kodeunit;
        }
        $model->unit = $kodeunit;

       


        return $this->render('create', [
            'model' => $model,
            'deskripsi' =>$deskripsi

        ]);
    }

    /**
     * Updates an existing CapaianPembelajaran model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = CapaianPembelajaran::find()->where(['kode'=>$id])->one();
        $bahasa = Bahasa::find()->all();
        foreach ($bahasa as $detail) {
            $data1 = CapaianPembelajaran::find()->where(['kode'=>$id,'bahasa'=>$detail->id_bahasa,'is_deleted'=>false])->one();

            $deskripsi[$detail->id_bahasa] =($data1)?$data1->deskripsi:"";
        }
        


        if ($model->load(Yii::$app->request->post())) {
            foreach ($bahasa as $detail) {
                $request = Yii::$app->request;
                $deskripsi=null;
       
                $deskripsi = $request->post('deskripsi-' . $detail->id_bahasa);
               
                if ($deskripsi) {
                    $data = CapaianPembelajaran::find()->where(['kode'=>$id,'bahasa'=>$detail->id_bahasa,'is_deleted'=>false])->one();
       

                    if(is_null($data)) { 
                   
  
                       $data = new CapaianPembelajaran();
                    }   
                    $data->load(Yii::$app->request->post());
                    $data->bahasa = $detail->id_bahasa;
                    $data->deskripsi = $deskripsi;
                    $data->save();
                }
              
            }
            return $this->redirect('index');
        }


        return $this->render('update', [
        'model' => $model,
        'deskripsi' =>$deskripsi
        ]);
    }

    /**
     * Deletes an existing CapaianPembelajaran model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
   
        $model=CapaianPembelajaran::find()->where(['kode'=>$id])->all();
        foreach ($model as $data) {
            $data->is_deleted=true;
            $data->save();
        }


        return $this->redirect(['index']);
    }

    /**
     * Finds the CapaianPembelajaran model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CapaianPembelajaran the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CapaianPembelajaran::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
