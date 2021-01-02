<?php

use aryelds\sweetalert\SweetAlert;
use yii\bootstrap4\Html;
use yii\bootstrap4\Modal;

$this->title = 'ปรับข้อมูลคัดกรองบุหรี่-สุรา';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php if (Yii::$app->user->isGuest) { ?>
            <p>
            <?= Html::a('<i class="glyphicon glyphicon-log-in"></i> เข้าสู่ระบบ', ['/user/security/login'], ['class' => 'btn btn-warning']) ?>
            </p>
        <?php } ?>

<?php if (!Yii::$app->user->isGuest) { ?>
<div class="panel panel-primary">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-book"> <?= $this->title ?></i> MENU</h4></div>
        <div class="panel-body">

            <div class="alert bg_col_pinkligth" role="alert">
                <div class="row">
                 
                  

                    <div class="col-xs-5 col-sm-3 col-md-2">
                        <p>
                            <?= Html::a('<i class="glyphicon glyphicon-plus"></i><i class="glyphicon glyphicon-pencil"></i> งานสุขภาพจิต', ['/depress/'], ['class' => 'btn btn-warning']) ?>
                        </p>
                    </div>

                  
                </div></div>

            
      <?php } ?>
    </div>
          </div>