<?php

use yii\bootstrap4\Progress;
use yii\bootstrap4\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'Tools-Hos';
?>
<div class="site-index">
    
 

     <div class="jumbotron">
        
  
             <div class="d-flex justify-content-center">
        <h1 class="text-primary"><strong>ยินดีต้อนรับเข้าสู่</strong></h1>
            
                      </div>
                      <div class="d-flex justify-content-center">
        <p class="text-danger">ระบบจัดการข้อมูลหน่วยบริการ</p>
                  </div>
            <?php if (Yii::$app->user->isGuest) { ?>
                <div class="d-flex justify-content-center">
            <p>
            <?= Html::a('<i class="glyphicon glyphicon-log-in"></i> เข้าสู่ระบบ', ['/user/security/login'], ['class' => 'btn btn-warning']) ?>
            </p>
        </div>
        <?php } ?>


        <?php if (!Yii::$app->user->isGuest) { ?>
            
            <h3><?= Html::a ('(' .(Yii::$app->user->identity->username) . ')')?></h3>
                   
            <hr>
          <div class="panel panel-primary">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-book"> <?= $this->title ?></i> MENU</h4></div>
        <div class="panel-body">

            <div class="alert bg_col_pinkligth" role="alert">
                <div class="row">
                 
                  

                    <div class="col-xs-5 col-sm-3 col-md-2">
                        <p>
                            <?= Html::a('<i class="glyphicon glyphicon-plus"></i><i class="glyphicon glyphicon-pencil"></i> งานสุขภาพจิต', ['/depress/profile'], ['class' => 'btn btn-warning']) ?>
                        </p>
                    </div>

                  
                </div></div>

            
      <?php } ?>
    </div>
          </div>


