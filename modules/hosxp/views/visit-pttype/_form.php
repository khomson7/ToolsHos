<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\hosxp\models\VisitPttype */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="visit-pttype-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="alert bg_col_pink" role="alert">
<div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
    <?= $form->field($model, 'vn')->textInput(['readonly' => true]) ?>
            </div>
 <div class="col-xs-6 col-sm-6 col-md-6">
    <?= $form->field($model, 'pttype')->textInput(['readonly' => true]) ?>
 </div>
</div>
    
    <?= $form->field($model, 'claim_code')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('บันทึก', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
