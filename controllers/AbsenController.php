<?php

namespace app\controllers;

use Yii;
use app\models\Absen;
use app\models\AbsenSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query; 

/**
 * AbsenController implements the CRUD actions for Absen model.
 */
class AbsenController extends Controller
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
                    'delete' => ['POST','GET'],
                ],
            ],
        ];
    }

    /**
     * Lists all Absen models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AbsenSearch();
        $lokasi = yii::$app->request->get('lokasi');
        if ($searchModel->tanggal_awal =='') {
            $searchModel->tanggal_awal = date("Y-m-d");
        }
        if ($searchModel->tanggal_akhir =='') {
            $searchModel->tanggal_akhir = date("Y-m-d");
        }     
             
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $lokasi);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
/**
     * Displays a single FotoPegawai model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($nip,$jam_masuk,$jam_keluar)
    {
        return $this->render('view', [
            'model' =>  Absen::find()->where([
                "nip" => $nip,
                "jam_masuk" => $jam_masuk,
                "jam_keluar" => $jam_keluar,
                
            ])->one(),
        ]);
    }

    /**
     * Creates a new FotoPegawai model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Absen();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing FotoPegawai model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($nip,$jam_masuk,$jam_keluar)
    {
        $model = Absen::find()->where([
            "nip" => $nip,
            "jam_masuk" => $jam_masuk,
            "jam_keluar" => $jam_keluar,
            
        ])->one();

        if ($model->load(Yii::$app->request->post()) ) {
        
            if ($model->save()) {
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    
    /**
     * Displays a single Absen model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
  
    /**
     * Creates a new Absen model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    /**
     * Deletes an existing Absen model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($nip,$jam_masuk,$jam_keluar)
    {
      
        Absen::find()->where([
            "nip" => $nip,
            "jam_masuk" => $jam_masuk,
            "jam_keluar" => $jam_keluar,
            
        ])->one()->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Absen model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Absen the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Absen::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionNipList($q = null, $id = null) {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            $query = new Query;
            $query->select(["id"=>"nip","text" => "concat(nip ,' - ',nama)"])
                ->distinct()
                ->from('pegawai')
                ->where(['like', 'nip', $q])
                ->orWhere(['like', 'nama', $q])
                
                ->limit(20);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        }
        elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => City::find($id)->name];
        }
        return $out;
    }
}
