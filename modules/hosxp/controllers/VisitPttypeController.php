<?php

namespace app\modules\hosxp\controllers;

use Yii;
use app\modules\hosxp\models\VisitPttype;
use app\modules\hosxp\models\VisitPttypeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ArrayDataProvider;
/**
 * VisitPttypeController implements the CRUD actions for VisitPttype model.
 */
class VisitPttypeController extends Controller
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
    
    public function actionClaimcode($user = null)
    {
        $url = Yii::$app->params['webservice1'];
        if ($user == null) {
            $user = '';
        }

        //$url = Yii::$app->params['webservice'];
        $user_id = Yii::$app->user->getId();
        $rows = (new \yii\db\Query())
            ->select(['check_token','opduser'])
            ->from('check_token')
            ->join('INNER JOIN', 'user', 'user.id =check_token.user_id')
            ->where('user_id = :id', [':id' => $user_id])
            ->all();
        if (!$user_id) {
            throw new \Exception;
        }
        foreach ($rows as $rows) {

            $token = $rows['check_token'];
            $opduser = $rows['opduser'];

        }

        try {

        
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "$url/claimcodes/visit/$user", //เปลี่ยนแปลง
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_POSTFIELDS => "",
                CURLOPT_HTTPHEADER => array(
                    "Authorization: Bearer $token",
                    "Content-Type: application/json",
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);


            $data = json_decode($response, true);

            $dataProvider = new ArrayDataProvider([
                'allModels' => $data,
                'pagination' => false, /* [
                'pageSize' => 3,
                ] , */
                'sort' => [
                    'attributes' => ['id'],
                ],
            ]);

      

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "$url/claimcodes/userclaim/$opduser", //เปลี่ยนแปลง
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_POSTFIELDS => "",
                CURLOPT_HTTPHEADER => array(
                    "Authorization: Bearer $token",
                    "Content-Type: application/json",
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            $data = json_decode($response, true);

            $dataProvider2 = new ArrayDataProvider([
                'allModels' => $data,
                'pagination' => false, /* [
                'pageSize' => 3,
                ] , */
                'sort' => [
                    'attributes' => ['id'],
                ],
            ]);
        } catch (\Exception $e) {

            //echo "ท่านไม่ได้รับสิทธ";
            return $this->redirect(['/site/api-err']);
        }

        return $this->render('claimcode', [
            'user' => $user,
            //'ptname' => $ptname,
            //'birthdate' => $birthdate,
            'dataProvider' => $dataProvider,
            'dataProvider2' => $dataProvider2,
        ]);
    }
    

    /**
     * Lists all VisitPttype models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VisitPttypeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single VisitPttype model.
     * @param string $vn
     * @param string $pttype
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
  /*  
    public function actionView($vn, $pttype)
    {
        return $this->render('view', [
            'model' => $this->findModel($vn, $pttype),
        ]);
    }
*/
    /**
     * Creates a new VisitPttype model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
   /* 
    public function actionCreate()
    {
        $model = new VisitPttype();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'vn' => $model->vn, 'pttype' => $model->pttype]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    */

    /**
     * Updates an existing VisitPttype model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $vn
     * @param string $pttype
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($vn, $pttype)
    {
        $model = $this->findModel($vn, $pttype);
        
        $url = Yii::$app->params['webservice1'];
        $user_id = Yii::$app->user->getId();
        $rows = (new \yii\db\Query())
            ->select(['check_token','opduser'])
            ->from('check_token')
            ->join('INNER JOIN', 'user', 'user.id =check_token.user_id')
            ->where('user_id = :id', [':id' => $user_id])
            ->all();
        if (!$user_id) {
            throw new \Exception;
        }
        foreach ($rows as $rows) {

            $token = $rows['check_token'];
            $opduser = $rows['opduser'];

        }

       
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "$url/claimcodes/claim/$vn/$pttype", //เปลี่ยนแปลง
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_POSTFIELDS => "",
                CURLOPT_HTTPHEADER => array(
                    "Authorization: Bearer $token",
                    "Content-Type: application/json",
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            $data = json_decode($response, true);
            
            foreach ($data['data'] as $key => $item) {

            $vn = $item['vn'];
          
            }

        if ($model->load(Yii::$app->request->post())) {
            
            $model->staff = $opduser;
            $model->save();
            
            return $this->redirect(['/hosxp/visit-pttype/claimcode']);
          //  return $this->redirect(['view', 'vn' => $model->vn, 'pttype' => $model->pttype]);
            
        }

        return $this->render('update', [
            'model' => $model,
            'vn' => $vn,
        ]);
    }

    /**
     * Deletes an existing VisitPttype model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $vn
     * @param string $pttype
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
   /* 
    public function actionDelete($vn, $pttype)
    {
        $this->findModel($vn, $pttype)->delete();

        return $this->redirect(['index']);
    }
    
*/
    /**
     * Finds the VisitPttype model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $vn
     * @param string $pttype
     * @return VisitPttype the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($vn, $pttype)
    {
        if (($model = VisitPttype::findOne(['vn' => $vn, 'pttype' => $pttype])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
