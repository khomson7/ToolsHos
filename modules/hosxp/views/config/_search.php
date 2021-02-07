<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\hosxp\models\ConfigSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="config-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'hospcode') ?>

    <?= $form->field($model, 'befor_byear') ?>

    <?= $form->field($model, 'byear') ?>

    <?= $form->field($model, 'chwpart') ?>

    <?php // echo $form->field($model, 'amppart') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
