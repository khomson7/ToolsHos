<?php

namespace app\modules\depress\controllers;

use Yii;
use app\modules\depress\models\Profile;
use app\modules\depress\models\ProfileSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use aryelds\sweetalert\SweetAlert;
use  yii\web\Session;
use app\modules\depress\models\MyActiveRecord;
/**
 * ProfileController implements the CRUD actions for Profile model.
 */
class ProfileController extends Controller
{
      protected function exec_db_user($sql = NULL) {
        return \Yii::$app->db->createCommand($sql)->execute();
    }
    
      protected function exec_hos($sql = NULL) {
        return \Yii::$app->db2->createCommand($sql)->execute();
    }
    
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
     * Lists all Profile models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProfileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

       // return $this->redirect('index');
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    
    
       public function actionIndex2()
    {
        
        
    }
    
    public function actionTest()
    {
        $session = Yii::$app->session; 
          //echo $session->get('mytoken');
        $user = '0143';
        $b_date = '2019-12-27';
        $url = Yii::$app->params['webservice'];
        
        $token = $session->get('mytoken');
          
        // $session = '111';
           // $session->open();
           // $session->close(); 
               $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "$url/ppspecials/$b_date/$user",
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
                    "Content-Type: application/json"
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            
             echo $token;

          // $jsonurl = "$url/ppspecials/$b_date/$user";
        // $json = file_get_contents($response);  
         //  $data = json_decode( $response, true);
         //  $datacount = sizeof($data['data']);
           
        //   foreach($data['data'] as $key => $item) {

         //  echo $item['pp_special_id'];
           
     // $session = Yii::$app->session; 
  
        
        //   }  
    }
    
    
    

    /**
     * Displays a single Profile model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        //เพิ่มเข้ามา
        
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            
            $req = \Yii::$app->request; //เมื่อมีการเรียกใช้งาน
            $post = $req->post(); //ให้โพสต์ค่า
            
            $uid = $post['Profile'] ['user_id']; 
            $doctor_code = $post['Profile'] ['doctor_code']; 
            $rdate = $post['Profile'] ['b_date'];
             $user_id = Yii::$app->user->getId();
             
             
             
             
               $sql = "UPDATE profile set b_date = '$rdate' WHERE user_id = '$uid' ";
            $this->exec_db_user($sql);
            
            $session = '111';
            $session->open();
            
            
            $jsonurl = "http://127.0.0.1:3012/ppspecials/$rdate/$doctor_code";
            
            
            
            
$json = file_get_contents($jsonurl);  
$data = json_decode($json, true);
$count_data = sizeof($data['data']);

           
       foreach($data['data'] as $key => $item) {
  
          $sql = "INSERT IGNORE INTO pp_special(pp_special_id,vn,pp_special_type_id,doctor,pp_special_service_place_type_id,entry_datetime,dest_hospcode,hn)
              VALUE('{$item['pp_special_id']}','{$item['vn']}','{$item['pp_special_type_id']}','{$item['doctor']}','{$item['pp_special_service_place_type_id']}','{$item['entry_datetime']}','{$item['dest_hospcode']}','{$item['hn']}')";
        $this->exec_hos($sql);
        
        $sql2 = "update serial 
SET serial_no = (select max(pp_special_id) FROM pp_special)
WHERE name = 'pp_special_id'";
        $this->exec_hos($sql2);
        

    
        
      
     }
     

     echo   Yii::$app->getSession()->setFlash('success', 'ประมวลผลเรียบร้อยแล้ว!! ');
            return $this->redirect(['view', 'id' => $model->user_id]);
            
        }
        
         

 
        
        return $this->render('view', [
            
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Profile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    
    /*
    public function actionCreate()
    {
        $model = new Profile();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->user_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
*/
    
    /**
     * Updates an existing Profile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    
    
    /*
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);     
        }

        return $this->renderAjax('update', [
            'model' => $model,
        ]);
    } */
    
    
     public function actionUpdate($id) {
         
         
         $session = Yii::$app->session;    
        $token = $session->get('mytoken');
         $session->open();
         
         $session->close();
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $req = \Yii::$app->request;
            $post = $req->post();


            $user = $post['Profile'] ['doctor_code'];
            $b_date = $post['Profile'] ['b_date'];
            $url = Yii::$app->params['webservice'];
			
          //   $session = Yii::$app->session; 
            // $token = $session->get('mytoken');
          //  $token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJyZXN1bHQiOnsiZW1haWwiOiJraG9tc29uN0BnbWFpbC5jb20iLCJwY3VfY29kZSI6IjEwOTE4In0sImlhdCI6MTU5MTI1NDA1NSwiZXhwIjoxNTkxMzQwNDU1fQ.p6CB_f9BWNH9LDkYrdteyJlkYSIZi9bQnN6cNXHi50Y';
           // $session = '111';
           // $session->open();
           // $session->close(); 
               $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "$url/ppspecials/ppspecials2/$b_date/$user", //เปลี่ยนแปลง
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
                    "Content-Type: application/json"
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

          // $jsonurl = "$url/ppspecials/$b_date/$user";
        //  $json = file_get_contents($response);  
           $data = json_decode($response, true);
           $datacount = sizeof($data['data']);

         // echo $datacount;
           
       foreach($data['data'] as $key => $item) {
           
            
                  $pp_special_id = $item['pp_special_id'];
                  $vn = $item['vn'];
                  $pp_special_type_id = $item['pp_special_type_id'];
                  $doctor = $item['doctor'];
                  $pp_special_service_place_type_id = $item['pp_special_service_place_type_id'];
                  $entry_datetime = $item['entry_datetime'];
                  $dest_hospcode = $item['dest_hospcode'];
                  $hn = $item['hn'];

         /*
          $sql = "INSERT IGNORE INTO pp_special(pp_special_id,vn,pp_special_type_id,doctor,pp_special_service_place_type_id,entry_datetime,dest_hospcode,hn)
            VALUE('{$item['pp_special_id']}','{$item['vn']}','{$item['pp_special_type_id']}','{$item['doctor']}','{$item['pp_special_service_place_type_id']}','{$item['entry_datetime']}','{$item['dest_hospcode']}','{$item['hn']}')";
        */
            
           
            $sql = "INSERT IGNORE INTO pp_special(pp_special_id,vn,pp_special_type_id,doctor,pp_special_service_place_type_id,entry_datetime,dest_hospcode,hn)
            VALUE('$pp_special_id','$vn','$pp_special_type_id','$doctor','$pp_special_service_place_type_id','$entry_datetime','$dest_hospcode','$hn')";
            $this->exec_hos($sql);
        
      
    
        $sql2 = "update serial 
                SET serial_no = (select max(pp_special_id) FROM pp_special)
                 WHERE name = 'pp_special_id'";
        $this->exec_hos($sql2);
       
         $sql3 = "update profile 
                SET data_count = '$datacount' ,b_date = '$b_date'
                 WHERE user_id = '$id'";
        $this->exec_db_user($sql3);
        
     // Yii::$app->getSession()->setFlash('success', 'ประมวลผลเรียบร้อยแล้ว!! ');
                
      
    } 


             return $this->redirect(['index'
                 
                 
                 ]);
          // return $this->redirect(['update', 'id' => $model->user_id]);
        }
  
        return $this->renderAjax('update', [
                    'model' => $model,
            
        ]);
    }
    
    
    
     public function actionUpdate2($id) {
         
         
         $session = Yii::$app->session;    
        $token = $session->get('mytoken');
         $session->open();
         
         $session->close();
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $req = \Yii::$app->request;
            $post = $req->post();

            
            $email = $post['Profile'] ['gravatar_email'];
            $password = $post['Profile'] ['ps'];
           // $username ='';
            $url = Yii::$app->params['webservice'];
            
     
			
          
               $curl = curl_init();

            curl_setopt_array($curl, array(
             CURLOPT_URL => "$url/users",
             CURLOPT_RETURNTRANSFER => true,
             CURLOPT_ENCODING => "",
             CURLOPT_MAXREDIRS => 10,
             CURLOPT_TIMEOUT => 0,
             CURLOPT_FOLLOWLOCATION => true,
             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
             CURLOPT_CUSTOMREQUEST => "POST",
             CURLOPT_POSTFIELDS =>"{\r\n\"id\":\"$id\",\r\n\"email\":\"$email\",\r\n\"password\":\"$password\"\r\n}",
              // CURLOPT_POSTFIELDS => "{\r\n\"id\":\"$id\",\r\n\"email\":\"$email\",\r\n\"password\":\"$password\"\r\n}\r\n",
               CURLOPT_HTTPHEADER => array(
              "Authorization: Bearer $token",
              "Content-Type: application/json"
            ),
           ));
            
            
            $response = curl_exec($curl);

            curl_close($curl);
             

             return $this->redirect(['index'
                 
                 
                 ]);
          // return $this->redirect(['update', 'id' => $model->user_id]);
        }
  
        return $this->renderAjax('update2', [
                    'model' => $model,
            
        ]);
    }
    
    

    
    protected function findModel($id)
    {
        if (($model = Profile::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
