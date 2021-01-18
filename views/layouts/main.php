<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use app\assets\MaterialAsset;
use yii\helpers\Html;

//AppAsset::register($this);

MaterialAsset::register($this);
$url = Yii::getAlias("@web") . '/images/';
?>
<?php $this->beginPage()?>
<!DOCTYPE html>
<html lang="<?=Yii::$app->language?>">
    <head>
        <meta charset="<?=Yii::$app->charset?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?=Html::csrfMetaTags()?>
        <title><?=Html::encode($this->title)?></title>
        <?php $this->head()?>
        <link href='https://fonts.googleapis.com/css?family=Kanit:400,300&subset=thai,latin' rel='stylesheet' type='text/css'>

        <script src="http://code.jquery.com/jquery.js"></script>
        <style>
            body {
                font-family: 'Kanit', sans-serif;
            }
            h1 {
                font-family: 'Kanit', sans-serif;
            }
            h2 {
                font-family: 'Kanit', sans-serif;
            }
            h3 {
                font-family: 'Kanit', sans-serif;
            }
            h4 {
                font-family: 'Kanit', sans-serif;
            }
            h5 {
                font-family: 'Kanit', sans-serif;
            }
            div {
                font-family: 'Kanit', sans-serif;
            }
            body  {



  top:0;
  z-index:1;
  width:100%;
  height:100%;

              background-image: url('../web/images/blur.jpg') ;


            }

        </style>
    </head>
    <body>
        <?php $this->beginBody()?>

        <div class="wrap">
            <?php
NavBar::begin([
    'brandLabel' => Yii::$app->name,
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar navbar-expand-lg navbar-dark navbar-full bg-secondary',

    ],
]);

$menuItems = [
];
if (Yii::$app->user->isGuest) {
    // $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
    //  $menuItems[] = ['label' => 'เข้าสู่ระบบ', 'url' => ['/user/security/login']];
} else {
    $menuItems[] = '<li>'
    . Html::beginForm(['/site/logout'], 'post')
    . Html::a('ออกจากระบบ <i class="glyphicon glyphicon-log-out"></i>', ['/site/logout'], [
        'data' => [
            'method' => 'post',
        ],
        'class' => 'btn btn-default',
    ])
    . Html::endForm()
        . '</li>';
}
echo Nav::widget([
    'options' => ['class' => ''],
    'items' => $menuItems,
]);
NavBar::end();
?>

            

                <?=
Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
])
?>
                <?=Alert::widget()?>

                <?=$content?>


            </div>

        </div>
    </div>


    <?php
yii\bootstrap4\Modal::begin([
    'id' => 'modal',
    'size' => 'modal-lg',
]);
echo "<div id='modalContent'></div>
    div class='modal-header'>

        <h4 class='modal-title'>Modal Header</h4>
      </div>
";
yii\bootstrap4\Modal::end();
?>

    <footer class="footer">
        <div class="container">
            <p class="float-left">&copy; <?=Html::encode(Yii::$app->name)?> <?=date('Y')?></p>


        </div>
    </footer>

<?php $this->endBody()?>
</body>
</html>
<?php $this->endPage()?>