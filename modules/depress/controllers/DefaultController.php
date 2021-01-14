<?php

namespace app\modules\depress\controllers;

use app\modules\depress\models\Profile;
use aryelds\sweetalert\SweetAlert;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Default controller for the `depress` module
 */
class DefaultController extends Controller
{

    protected function exec_tbtools($sql = null)
    {
        return \Yii::$app->db->createCommand($sql)->execute();
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionDepress()
    {
        // return $this->render('depress');
        return $this->redirect('/depress/ppspecialapi');
    }

    public function actionPpspecialapi()
    {

        $url = Yii::$app->params['webservice'];
        $user_id = Yii::$app->user->getId();
        $rows = (new \yii\db\Query())
            ->select(['check_token'])
            ->from('check_token')
            ->where('user_id = :id', [':id' => $user_id])
            ->all();
        if (!$user_id) {
            throw new \Exception;
        }
        foreach ($rows as $rows) {

            $token = $rows['check_token'];

        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "$url/ppspecials/depress", //เปลี่ยนแปลง
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

        // $jsonurl = "$url/ppspecials/$b_date/$user";
        //  $json = file_get_contents($response);
        $data = json_decode($response, true);
        $datacount = sizeof($data['data']);

        // echo $datacount;

        foreach ($data['data'] as $key => $item) {

            $pp_special_id = $item['pp_special_id'];
            $vn = $item['vn'];
            $pp_special_type_id = $item['pp_special_type_id'];
            $doctor = $item['doctor'];
            $pp_special_service_place_type_id = $item['pp_special_service_place_type_id'];
            $entry_datetime = $item['entry_datetime'];
            $dest_hospcode = $item['dest_hospcode'];
            $hn = $item['hn'];

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "$url/ppspecials",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "{
                \"pp_special_id\":\"$pp_special_id\",
                \"vn\":\"$vn\",
                \"pp_special_type_id\":\"$pp_special_type_id\",
                \"doctor\":\"$doctor\",
                \"pp_special_service_place_type_id\":\"$pp_special_service_place_type_id\",
                \"entry_datetime\":\"$entry_datetime\",
                \"dest_hospcode\":\"$dest_hospcode\",
                \"hn\":\"$hn\"
                    }",
                CURLOPT_HTTPHEADER => array(
                    "Authorization: Bearer $token",
                    "Content-Type: application/json",
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "$url/ppspecials/updateserial", //เปลี่ยนแปลง
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

        }

        echo SweetAlert::widget([
            'options' => [
                'title' => "ปรับข้อมูล!",
                'text' => "จำนวน => " . sizeof($data['data']) . " Reccord ",
                'type' => SweetAlert::TYPE_SUCCESS,
            ],
        ]);
        // return $this->redirect(['/depress/line/curl-depress']);
        return $this->render('index');
        //echo sizeof($data['data']);
        /*
    return $this->render('index', [
    'searchModel' => $searchModel,
    'dataProvider' => $dataProvider,
    ]);
     */
    }

    public function actionAllsm($date1 = null)
    {

        $url = Yii::$app->params['webservice'];
        $user_id = Yii::$app->user->getId();
        $rows = (new \yii\db\Query())
            ->select(['check_token'])
            ->from('check_token')
            ->where('user_id = :id', [':id' => $user_id])
            ->all();
        if (!$user_id) {
            throw new \Exception;
        }
        foreach ($rows as $rows) {

            $token = $rows['check_token'];

        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "$url/users/dateprocess", //เปลี่ยนแปลง
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "",
            CURLOPT_HTTPHEADER => array(
                //   "Authorization: Bearer $token",
                "Content-Type: application/json",
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $data = json_decode($response, true);
        //  $datacount = sizeof($data['data']);

        // echo $datacount;

        foreach ($data['data'] as $key => $item) {

            $date = $item['b_date'];
        }

        if ($date1 == null) {

            // $date1 = date('Y');
            $date1 = $date;
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "$url/users/dateprocess",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{
                \"id\":\"1\",
                \"b_date\":\"$date1\"
                    }",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer $token",
                "Content-Type: application/json",
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "$url/ppspecials/allsm/$date1", //เปลี่ยนแปลง
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
        // $datacount = sizeof($data['data']);

        // echo $datacount;

        foreach ($data['data'] as $key => $item) {

            $pp_special_id = $item['pp_special_id'];
            $vn = $item['vn'];
            $pp_special_type_id = $item['pp_special_type_id'];
            $doctor = $item['doctor'];
            $pp_special_service_place_type_id = $item['pp_special_service_place_type_id'];
            $entry_datetime = $item['entry_datetime'];
            $dest_hospcode = $item['dest_hospcode'];
            $hn = $item['hn'];

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "$url/ppspecials",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "{
                \"pp_special_id\":\"$pp_special_id\",
                \"vn\":\"$vn\",
                \"pp_special_type_id\":\"$pp_special_type_id\",
                \"doctor\":\"$doctor\",
                \"pp_special_service_place_type_id\":\"$pp_special_service_place_type_id\",
                \"entry_datetime\":\"$entry_datetime\",
                \"dest_hospcode\":\"$dest_hospcode\",
                \"hn\":\"$hn\"
                    }",
                CURLOPT_HTTPHEADER => array(
                    "Authorization: Bearer $token",
                    "Content-Type: application/json",
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);


        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "$url/ppspecials/updateserial", //เปลี่ยนแปลง
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

        echo SweetAlert::widget([
            'options' => [
                'title' => "ปรับข้อมูล!",
                'text' => "จำนวน => " . sizeof($data['data']) . " Reccord ",
                'type' => SweetAlert::TYPE_SUCCESS,
            ],
        ]);

        return $this->render('allsm', [
            'date1' => $date1,
        ]);
    }

    public function actionAllAutoSm($date1 = null)
    {

        $date0 = date('Y-m-d');
        $sql = " REPLACE INTO `date_process` (`id`, `b_date`) VALUES ('1',' $date0') ";
        \Yii::$app->db->createCommand($sql)->execute();

        $url = Yii::$app->params['webservice'];
        $email = Yii::$app->params['email'];

        $sql = "select * from user where email = '$email'";
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        if (!$email) {
            throw new \Exception;
        }
        foreach ($data as $data) {
            $uid = $data['id'];

        }

        try {
            $sql = "select check_token
                       from check_token WHERE user_id = '$uid'";

            $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
            foreach ($rawData as $rows) {

                $token = $rows['check_token'];

            }
        } catch (\yii\db\Exception $e) {
            return $this->redirect(['/site/api-err']);
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "$url/users/dateprocess", //เปลี่ยนแปลง
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "",
            CURLOPT_HTTPHEADER => array(
                //   "Authorization: Bearer $token",
                "Content-Type: application/json",
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $data = json_decode($response, true);
        //  $datacount = sizeof($data['data']);

        // echo $datacount;

        foreach ($data['data'] as $key => $item) {

            $date1 = $item['d_process'];

        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "$url/ppspecials/allsm/$date1", //เปลี่ยนแปลง
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
        $datacount = sizeof($data['data']);
        $date_count = date('Y-m-d H:i:s');

        $sql = "REPLACE INTO data_count(data_count,date_count,process_id)
           VALUE('$datacount','$date_count','1')";
        \Yii::$app->db->createCommand($sql)->execute();

        // echo $datacount;

        foreach ($data['data'] as $key => $item) {

            $pp_special_id = $item['pp_special_id'];
            $vn = $item['vn'];
            $pp_special_type_id = $item['pp_special_type_id'];
            $doctor = $item['doctor'];
            $pp_special_service_place_type_id = $item['pp_special_service_place_type_id'];
            $entry_datetime = $item['entry_datetime'];
            $dest_hospcode = $item['dest_hospcode'];
            $hn = $item['hn'];

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "$url/ppspecials",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "{
                \"pp_special_id\":\"$pp_special_id\",
                \"vn\":\"$vn\",
                \"pp_special_type_id\":\"$pp_special_type_id\",
                \"doctor\":\"$doctor\",
                \"pp_special_service_place_type_id\":\"$pp_special_service_place_type_id\",
                \"entry_datetime\":\"$entry_datetime\",
                \"dest_hospcode\":\"$dest_hospcode\",
                \"hn\":\"$hn\"
                    }",
                CURLOPT_HTTPHEADER => array(
                    "Authorization: Bearer $token",
                    "Content-Type: application/json",
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "$url/ppspecials/updateserial", //เปลี่ยนแปลง
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

        echo SweetAlert::widget([
            'options' => [
                'title' => "ปรับข้อมูล!",
                'text' => "จำนวน => " . sizeof($data['data']) . " Reccord ",
                'type' => SweetAlert::TYPE_SUCCESS,
            ],
        ]);

        return $this->redirect(['/depress/line/curl-depress']);
        return $this->render('all-auto-sm', [
            'date1' => $date1,
        ]);

    }

    public function actionUpdate($id)
    {
        //   $this->permitRole([1]);
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    protected function findModel($id)
    {
        if (($model = Profile::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
