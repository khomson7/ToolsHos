<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\hosxp\models\VisitPttypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Visit Pttypes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visit-pttype-index">

   

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'vn',
            'pttype',
            'staff',
            'rcpt_amount',
            'debt_amount',
            //'discount_amount',
            //'begin_date',
            //'expire_date',
            //'hospmain',
            //'hospsub',
            //'pttypeno',
            //'pttype_number',
            //'pttype_order',
            //'discount_percent',
            //'company_id',
            //'contract_id',
            //'max_debt_amount',
            //'paid_amount',
            //'claim_code',
            //'hos_guid',
            //'limit_hour',
            //'check_limit_hour',
            //'finance_clear_ok',
            //'hos_guid_ext',
            //'confirm_and_locked_datetime',
            //'confirm_and_locked',
            //'confirm_and_locked_staff',
            //'nhso_govcode',
            //'nhso_govname',
            //'nhso_docno',
            //'nhso_ownright_pid',
            //'nhso_ownright_name',
            //'update_datetime',
            //'emp_privilege',
            //'emp_id',
            //'pttype_service_charge',
            //'pttype_note:ntext',
            //'auth_code',
            //'rcpno_list',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
