<?php

namespace app\controllers;

use app\models\ContactForm;
use app\models\LoginForm;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;

class SiteController extends Controller
{

    /**
     * {@inheritdoc}
     */

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {

        $url = Yii::$app->params['webservice'];
        if (!\Yii::$app->user->isGuest) {

            $user_id = \Yii::$app->user->identity->id;

            try {

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
                // $session = Yii::$app->session;
                //   $session->set('mytoken', $token);
                //  $token = $session->get('mytoken');
                //  echo $token ;

                return $this->render('index'); //login sucsess

            } catch (\Exception $e) {

                //echo "ท่านไม่ได้รับสิทธ";
                return $this->redirect(['/site/api-err']);
            }

        }
        return $this->render('index2'); //No login
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionAutoLogin()
    {

        $url = Yii::$app->params['webservice'];
        $email = Yii::$app->params['email'];
        $upassword = Yii::$app->params['ps'];
        $ip = '127.0.0.1';

        $sql = "select * from user where email = '$email'";
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        if (!$email) {
            throw new \Exception;
        }
        foreach ($data as $data) {
            $uid = $data['id'];

        }

        try {
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "$url/users/login",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "{\r\n\"email\":\"$email\",\r\n\"password\":\"$upassword\"\r\n}\r\n",
                CURLOPT_HTTPHEADER => array(
                    "Content-Type: application/json",
                ),
            ));

            $response = curl_exec($curl);
            //  echo $response ;

            $data = '{
    "success": 1,
    "data": [' . $response . ']
}';
            curl_close($curl);

            if (!$response) {
                //  return $this->redirect('api-error');
            }

            $json_api0 = json_decode($data, true);
            foreach ($json_api0['data'] as $value) {

                $token = $value['token'];

                $date_update = date('Y-m-d H:i:s');

                $sql = "REPLACE INTO  `check_token`(`user_id`,`check_token`,`date_update`)
                    VALUE('$uid','$token','$date_update')";
                \Yii::$app->db->createCommand($sql)->execute();

                $sql = " INSERT INTO `user_log` (`user_id`, `login_date`, `ip`,`remark`) VALUES ('$uid',NOW(), '$ip','auto-login') ";
                \Yii::$app->db->createCommand($sql)->execute();

            }

        } catch (\Exception $e) {

            //echo "ท่านไม่ได้รับสิทธ";
            return $this->redirect(['/site/api-err']);
        }
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        $session = Yii::$app->session;
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionApiErr()
    {
        return $this->render('api-err');
    }

}
