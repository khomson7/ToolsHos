<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\hosxp\models\VisitPttypeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="visit-pttype-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'vn') ?>

    <?= $form->field($model, 'pttype') ?>

    <?= $form->field($model, 'staff') ?>

    <?= $form->field($model, 'rcpt_amount') ?>

    <?= $form->field($model, 'debt_amount') ?>

    <?php // echo $form->field($model, 'discount_amount') ?>

    <?php // echo $form->field($model, 'begin_date') ?>

    <?php // echo $form->field($model, 'expire_date') ?>

    <?php // echo $form->field($model, 'hospmain') ?>

    <?php // echo $form->field($model, 'hospsub') ?>

    <?php // echo $form->field($model, 'pttypeno') ?>

    <?php // echo $form->field($model, 'pttype_number') ?>

    <?php // echo $form->field($model, 'pttype_order') ?>

    <?php // echo $form->field($model, 'discount_percent') ?>

    <?php // echo $form->field($model, 'company_id') ?>

    <?php // echo $form->field($model, 'contract_id') ?>

    <?php // echo $form->field($model, 'max_debt_amount') ?>

    <?php // echo $form->field($model, 'paid_amount') ?>

    <?php // echo $form->field($model, 'claim_code') ?>

    <?php // echo $form->field($model, 'hos_guid') ?>

    <?php // echo $form->field($model, 'limit_hour') ?>

    <?php // echo $form->field($model, 'check_limit_hour') ?>

    <?php // echo $form->field($model, 'finance_clear_ok') ?>

    <?php // echo $form->field($model, 'hos_guid_ext') ?>

    <?php // echo $form->field($model, 'confirm_and_locked_datetime') ?>

    <?php // echo $form->field($model, 'confirm_and_locked') ?>

    <?php // echo $form->field($model, 'confirm_and_locked_staff') ?>

    <?php // echo $form->field($model, 'nhso_govcode') ?>

    <?php // echo $form->field($model, 'nhso_govname') ?>

    <?php // echo $form->field($model, 'nhso_docno') ?>

    <?php // echo $form->field($model, 'nhso_ownright_pid') ?>

    <?php // echo $form->field($model, 'nhso_ownright_name') ?>

    <?php // echo $form->field($model, 'update_datetime') ?>

    <?php // echo $form->field($model, 'emp_privilege') ?>

    <?php // echo $form->field($model, 'emp_id') ?>

    <?php // echo $form->field($model, 'pttype_service_charge') ?>

    <?php // echo $form->field($model, 'pttype_note') ?>

    <?php // echo $form->field($model, 'auth_code') ?>

    <?php // echo $form->field($model, 'rcpno_list') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
