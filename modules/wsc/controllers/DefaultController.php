<?php

namespace app\modules\wsc\controllers;

//use app\modules\depress\models\Profile;
use aryelds\sweetalert\SweetAlert;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Default controller for the `wsc` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

     public function actionSmdrfromhos()
    {

        $url = Yii::$app->params['webservice1'];
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
            CURLOPT_URL => "$url/opdscreens/smdrfromhos", //เปลี่ยนแปลง
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
       // $datacount = sizeof($data['data']);


        foreach ($data['data'] as $key => $item) {
 
        	$vn = $item['vn'];
 			$hn = $item['hn'];
            $vstdate = $item['vstdate'];
            $vsttime = $item['vsttime'];
            $drinking_type_id = $item['drinking_type_id'];
            $smoking_type_id = $item['smoking_type_id'];
            $chwpart = $item['chwpart'];
            $amppart = $item['amppart'];
            $tmbpart = $item['tmbpart'];
            $moopart = $item['moopart'];
            $cid = $item['cid'];

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "$url/opdscreens/smdr",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "{
                \"vn\":\"$vn\",
                \"hn\":\"$hn\",
                \"vstdate\":\"$vstdate\",
                \"vsttime\":\"$vsttime\",
                \"drinking_type_id\":\"$drinking_type_id\",
                \"smoking_type_id\":\"$smoking_type_id\",
                \"chwpart\":\"$chwpart\",
                \"amppart\":\"$amppart\",
                \"tmbpart\":\"$tmbpart\",
                \"moopart\":\"$moopart\",
                \"cid\":\"$cid\"
                    }",
                CURLOPT_HTTPHEADER => array(
                   // "Authorization: Bearer $token",
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
        return $this->render('index');
 
    }
}
