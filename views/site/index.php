<?php

use yii\bootstrap4\Progress;
use yii\bootstrap4\Html;
use yii\helpers\Url;


/* @var $this yii\web\View */

$this->title = 'Tools-Hos';
?>
<div class="site-index">

    <div class="jumbotron">

        <div class="spinner-border text-muted"></div>
        <div class="spinner-border text-primary"></div>
        <div class="spinner-border text-success"></div>
        <div class="spinner-border text-info"></div>
        <div class="spinner-border text-warning"></div>
        <div class="spinner-border text-danger"></div>
        <div class="spinner-border text-secondary"></div>
        <div class="spinner-border text-dark"></div>
        <div class="spinner-border text-light"></div>

        <h1 class="text-primary"><strong>ยินดีต้อนรับเข้าสู่</strong></h1>


        <p class="text-danger">ระบบจัดการข้อมูลหน่วยบริการ</p>

        <?php if (Yii::$app->user->isGuest) { ?>
            <p>
                <?= Html::a('<i class="glyphicon glyphicon-log-in"></i> เข้าสู่ระบบ', ['/user/security/login'], ['class' => 'btn btn-warning']) ?>
            </p>
        <?php } ?>

        <?php if (!Yii::$app->user->isGuest) { ?>

            <h3><?= Html::a('(' . (Yii::$app->user->identity->username) . ')') ?></h3>

               <?php if (Yii::$app->user->identity->role == app\models\Users::ROLE_PR) { ?>
            <div class="panel panel-primary">
                <div class="text-success"><h4><?= $this->title ?>MENU</h4></div>
                <div class="panel-body"

                     <div class="alert bg_col_pinkligth" role="alert">  
                    <div class="btn-group btn-group-lg" role="group" aria-label="..."><p>
                            <?= Html::a('<i class=""></i> ข้อมูลผู้ป่วยใน(IPD)', ['/ipt/default/ipt-adm'], ['class' => 'btn btn-warning']) ?>
                        </p></div>
                    <div class="btn-group btn-group-lg" role="group" aria-label="..."><p>
                            <?= Html::a('<i class=""></i> ค้นคืนข้อมูลบุคคล', ['/ipt/default/patient'], ['class' => 'btn btn-danger']) ?>
                        </p></div>
                  
                   
                </div>

            </div>
            <?php } ?>
            <?php if (Yii::$app->user->identity->role != app\models\Users::ROLE_PR) { ?>
                <div class="panel panel-primary">
                <div class="text-success"><h4><?= $this->title ?>MENU</h4></div>
                <div class="panel-body"

                     <div class="alert bg_col_pinkligth" role="alert">  
                    <div class="btn-group btn-group-lg" role="group" aria-label="..."><p>
                            <?= Html::a('<i class=""></i> บุหรี่-สุรา(specialpp)', ['/depress/default/allsm'], ['class' => 'btn btn-warning']) ?>
                        </p></div>
                    <div class="btn-group" role="group" aria-label="..."><p>
                            <?= Html::a('<i class="fa fa-cloud"></i> 2Q(specialpp)', ['/depress'], ['class' => 'btn btn-danger']) ?>
                        </p></div>
                    <div class="btn-group btn-group-sm" role="group" aria-label="..."><p>
                            <?= Html::a('<i class="fa fa-cloud"></i> รอดำเนินการ', ['/'], ['class' => 'btn btn-info']) ?>
                        </p></div>
                </div>

            </div>
            <?php } ?>
        <?php } ?>

    </div>



