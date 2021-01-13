<?php

use yii\bootstrap4\Html;

/* @var $this yii\web\View */

$this->title = 'Tools-Hos';
?>

<?php
yii\bootstrap4\Modal::begin([
    'headerOptions' => ['id' => 'modalHeader'],
    'id' => 'modal',
    'size' => 'modal-lg',
    /*
    'closeButton' => [
    'id' => 'close-button',
    'class' => 'close',
    'data-dismiss' => 'modal',
    ],
     */
    //keeps from closing modal with esc key or by clicking out of the modal.
    // user must click cancel or X to close
    'clientOptions' => [
        'backdrop' => false,
        'keyboard' => false,
    ],
]);
echo "<div id='modalContent'> <h3> กำลังประมวลผลข้อมูลกรุณารอสักครู่ </h3> <div style='text-align:center'>" . Html::img('@web/images/ajax-loader.gif') . "</div></div>";
yii\bootstrap4\Modal::end();
?>

<div class="site-index">

    <div class="jumbotron">

        <div class="btn text-muted"></div>
        

        <h1 class="text-primary"><strong>ยินดีต้อนรับเข้าสู่</strong></h1>


        <p class="text-danger">ระบบจัดการข้อมูลหน่วยบริการ</p>

        <?php if (Yii::$app->user->isGuest) {?>
            <p>
                <?=Html::a('<i class="glyphicon glyphicon-log-in"></i> เข้าสู่ระบบ', ['/user/security/login'], ['class' => 'btn btn-warning'])?>
            </p>
        <?php }?>

        <?php if (!Yii::$app->user->isGuest) {?>

            <h3><?=Html::a('(' . (Yii::$app->user->identity->username) . ')')?></h3>

               <?php if (Yii::$app->user->identity->role == app\models\Users::ROLE_PR) {?>
            <div class="panel panel-primary">
                <div class="text-success"><h4><?=$this->title?>MENU</h4></div>
                <div class="panel-body"

                     <div class="alert bg_col_pinkligth" role="alert">
                   
                    <div class="btn-group btn-group-lg" role="group" aria-label="..."><p>
                            <?=Html::a('<i class=""></i> ClaimCode', ['/hosxp/visit-pttype/claimcode'], ['class' => 'btn btn-danger'])?>
                        </p></div>


                </div>

            </div>
            <?php }?>
            <?php if (Yii::$app->user->identity->role != app\models\Users::ROLE_PR) {?>
                <div class="panel panel-primary">
                <div class="text-success"><h4><?=$this->title?>MENU</h4></div>
                <div class="panel-body"

                     <div class="alert bg_col_pinkligth" role="alert">
                    <div class="btn-group btn-group-lg" role="group" aria-label="..."><p>
                            <?=Html::a('<i class=""></i> บุหรี่-สุรา(specialpp)', ['/depress/default/allsm'], ['class' => 'showModalButton btn btn-warning'])?>
                        </p></div>
                    <div class="btn-group" role="group" aria-label="..."><p>
                            <?=Html::a('<i class="fa fa-cloud"></i> 2Q(specialpp)', ['/depress'], ['class' => 'btn btn-danger'])?>
                        </p></div>
                    <div class="btn-group btn-group-sm" role="group" aria-label="..."><p>
                            <?=Html::a('<i class="fa fa-cloud"></i> รอดำเนินการ', ['/'], ['class' => 'btn btn-info'])?>
                        </p></div>
                </div>

            </div>
            <?php }?>
        <?php }?>

    </div>



