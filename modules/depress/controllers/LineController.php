<?php

namespace app\modules\depress\controllers;

use app\modules\depress\models\DataCount;
use Yii;
use yii\web\Controller;

/**
 * LinebotriskController implements the CRUD actions for Linebotrisk model.
 */
class LineController extends \yii\web\Controller
{

    public function actionCurlDepress()
    {

        // $last_thread = Linebotrisk::findOne(['name' => 'แจ้งเตือนความเสี่ยง']);

        $thread = DataCount::find()
            ->where('process_id = :process_id', [':process_id' => 1])
            ->orderBy(['id' => SORT_DESC])
            ->one();

        if ($thread != null) {
            $message = 'วันที่ : ' . $thread->date_count . ' ปรับข้อมูลจำนวน => ' . $thread->data_count;
            $res = $this->notify_message($message);
            return $this->redirect(['/depress/default/index']);
        }

    }

    public function notify_message($message)
    {
        $rows = (new \yii\db\Query())
            ->select(['token_'])
            ->from('tbl_token')

            ->where(['tbl_token.send_id' => [1],
            ])
            ->all();

        foreach ($rows as $rows) {

            $line_token = $rows['token_'];
            $line_api = 'https://notify-api.line.me/api/notify';
            $queryData = array('message' => $message);
            $queryData = http_build_query($queryData, '', '&');

            $headerOptions = array(
                'http' => array(
                    'method' => 'POST',
                    'header' => "Content-Type: application/x-www-form-urlencoded\r\n"
                    . "Authorization: Bearer " . $line_token . "\r\n"
                    . "Content-Length: " . strlen($queryData) . "\r\n",
                    'content' => $queryData,
                ),
            );

            $context = stream_context_create($headerOptions);

            $result = file_get_contents($line_api, false, $context);

        }
        $res = json_decode($result);
        return $res;
    }

}
