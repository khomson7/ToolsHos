<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\hosxp\models\Config */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="config-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="alert bg_col_pink" role="alert">
<div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
            <?= $form->field($model, 'hospcode')->textInput(['maxlength' => true]) ?>
            </div>
 <div class="col-xs-6 col-sm-6 col-md-6">
 <?= $form->field($model, 'chwpart')->textInput(['maxlength' => true]) ?>
 <?= $form->field($model, 'amppart')->textInput(['maxlength' => true]) ?>
 </div>
</div>


    <div class="form-group">
        <?= Html::submitButton('บันทึก', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
