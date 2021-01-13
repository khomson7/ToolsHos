<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\hosxp\models\VisitPttype */
/*
$this->title = 'Update Visit Pttype: ' . $model->vn;
$this->params['breadcrumbs'][] = ['label' => 'Visit Pttypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->vn, 'url' => ['view', 'vn' => $model->vn, 'pttype' => $model->pttype]];
$this->params['breadcrumbs'][] = 'Update';
 * */
 $this->title = 'บันทึก ClaimCode';
?>
<div class="visit-pttype-update">

    <div class="alert alert-warning">
    <h4> <?= Html::encode($this->title) ?></h4>
</div>
    
    <?= $this->render('_form', [
        'model' => $model,
        'vn' => $vn,
    ]) ?>

</div>
