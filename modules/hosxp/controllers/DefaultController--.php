<?php

namespace app\modules\hosxp\controllers;

use Yii;
use yii\data\ArrayDataProvider;
use yii\web\Controller;

/**
 * Default controller for the `hosxp` module
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


    public function actionReport1($date1 = null, $date2 = null)
    {

        $url = Yii::$app->params['webservice'];
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

        if ($date1 == null) {

            // $date1 = date('Y');
            $date1 = '';
            $date2 = '';
        }


        try {
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "$url/claimcodes/claimreport/$date1/$date2", //เปลี่ยนแปลง
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

            
        } catch (\Exception $e) {

            //echo "ท่านไม่ได้รับสิทธ";
            return $this->redirect(['/site/api-err']);
        }

        return $this->render('report1', [
            'date1' => $date1,
            'date2' => $date2,
            'dataProvider' =>  $dataProvider,
        ]);
    }


    public function actionClaimcode($user = null)
    {
        $url = Yii::$app->params['webservice'];
        if ($user == null) {
            $user = '';
        }

        //$url = Yii::$app->params['webservice'];
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
        } catch (\Exception $e) {

            //echo "ท่านไม่ได้รับสิทธ";
            return $this->redirect(['/site/api-err']);
        }

        return $this->render('claimcode', [
            'user' => $user,
            //'ptname' => $ptname,
            //'birthdate' => $birthdate,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionClaimcodeupdate($user = null)
    {
        $url = Yii::$app->params['webservice'];
        if ($user == null) {
            $user = '';
        }

        //$url = Yii::$app->params['webservice'];
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
        } catch (\Exception $e) {

            //echo "ท่านไม่ได้รับสิทธ";
            return $this->redirect(['/site/api-err']);
        }

        return $this->render('claimcode', [
            'user' => $user,
            //'ptname' => $ptname,
            //'birthdate' => $birthdate,
            'dataProvider' => $dataProvider,
        ]);
    }

}
