<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\hosxp\models\VisitPttype */

$this->title = $model->vn;
$this->params['breadcrumbs'][] = ['label' => 'Visit Pttypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="visit-pttype-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'vn' => $model->vn, 'pttype' => $model->pttype], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'vn' => $model->vn, 'pttype' => $model->pttype], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'vn',
            'pttype',
            'staff',
            'rcpt_amount',
            'debt_amount',
            'discount_amount',
            'begin_date',
            'expire_date',
            'hospmain',
            'hospsub',
            'pttypeno',
            'pttype_number',
            'pttype_order',
            'discount_percent',
            'company_id',
            'contract_id',
            'max_debt_amount',
            'paid_amount',
            'claim_code',
            'hos_guid',
            'limit_hour',
            'check_limit_hour',
            'finance_clear_ok',
            'hos_guid_ext',
            'confirm_and_locked_datetime',
            'confirm_and_locked',
            'confirm_and_locked_staff',
            'nhso_govcode',
            'nhso_govname',
            'nhso_docno',
            'nhso_ownright_pid',
            'nhso_ownright_name',
            'update_datetime',
            'emp_privilege',
            'emp_id',
            'pttype_service_charge',
            'pttype_note:ntext',
            'auth_code',
            'rcpno_list',
        ],
    ]) ?>

</div>
