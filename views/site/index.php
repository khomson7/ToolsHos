<?php

use yii\bootstrap\Html;

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


    <div class="d-flex justify-content-center">
        <h1 class="text-primary"><strong>ยินดีต้อนรับเข้าสู่</strong></h1>
            
                      </div>
                      <div class="d-flex justify-content-center">
        <p class="text-danger">ระบบจัดการข้อมูลหน่วยบริการ</p>
                  </div>

        <?php if (Yii::$app->user->isGuest) {?>
             <div class="d-flex justify-content-center">
            <p>
                <?=Html::a('<i class="glyphicon glyphicon-log-in"></i> เข้าสู่ระบบ', ['/user/security/login'], ['class' => 'btn btn-warning'])?>
            </p>
        </div>
        <?php }?>

        <?php if (!Yii::$app->user->isGuest) {?>
                    <div class="d-flex justify-content-center">
            <h3><?=Html::a('(' . (Yii::$app->user->identity->username) . ')')?></h3>
            </div>
            <div class="d-flex justify-content-center">
            <?=Html::a('<i class=" fa fa-gear"></i>', ['/hosxp/config'], ['class' => ''])?>
             </div>
             
               <?php if (Yii::$app->user->identity->role == app\models\Users::ROLE_PR) {?>
                <div class="d-flex justify-content-center">
            <div class="panel panel-primary">
                <div class="d-flex justify-content-center">
                <div class="text-success"><h4><?=$this->title?>MENU</h4></div>
            </div>
                <div class="panel-body"

                     <div class="alert bg_col_pinkligth" role="alert">
                   
                    <div class="btn-group btn-group-lg" role="group" aria-label="..."><p>
                            <?=Html::a('<i class=""></i> ClaimCode', ['/hosxp/visit-pttype/claimcode'], ['class' => 'btn btn-danger'])?>
                        </p></div>
                        <div class="btn-group" role="group" aria-label="..."><p>
                            <?=Html::a('<i class="fa fa-cloud"></i> ระบบรายงาน', ['/hosxp/default/report1'], ['class' => 'btn btn-info'])?>
                        </p></div>


                </div>

            </div>
        </div>
            <?php }?>
            <?php if (Yii::$app->user->identity->role != app\models\Users::ROLE_PR) {?>
                <div class="d-flex justify-content-center">
                <div class="panel panel-primary">
                 <div class="d-flex justify-content-center">
                <div class="text-success"><h4><?=$this->title?>MENU</h4></div>
                 </div>
                <div class="panel-body"

                     <div>
                     <div class="d-flex justify-content-center">
                    <div class="btn-group btn-group-lg" role="group" aria-label="..."><p>
                            <?=Html::a('<i class="fa fa-plus"></i> บุหรี่-สุรา(specialpp)', ['/depress/default/allsm'], ['class' => 'showModalButton btn btn-danger'])?>
                        </p></div>
						</div>
                  
                </div>

        
                <div>------------------------------------------</div>

                <div class="d-flex justify-content-center">
                <div class="text-primary"><h4><?=$this->title?>Report</h4></div>
                 </div>

                 <div class="panel-body"

                     <div>
                   
                     <div class="d-flex justify-content-center">
                    <div class="btn-group btn-group-sm" role="group" aria-label="..."><p>
                            <?=Html::a('<i class="fa fa-bar-chart-o"></i> ข้อมูลรายงาน', ['/hosxp/default/index'], ['class' => 'btn btn-info'])?>
                        </p></div>
                        </div>
                </div>

                
               

           
            <?php }?>
        <?php }?>

    </div>
</div>

