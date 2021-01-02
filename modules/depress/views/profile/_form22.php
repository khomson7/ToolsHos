<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\depress\models\Profile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profile-form">

    <?php $form = ActiveForm::begin(); ?>

   

    <div class="panel panel-danger">
        <div class="panel panel-danger">
            <div class="panel-heading"><h4>บันทึกรายการ</h4></div>
        </div>
        <div class="row">

    
            
             <div class="col-sm-offset-1 col-sm-7">   
                  <?= $form->field($model, 'doctor_code')->textInput(['readonly' => true]) ?>
                 
                 <?= $form->field($model, 'gravatar_email')->hiddenInput(['readonly' => true])->label(false); ?>
                 
                <?= $form->field($model, 'ps')->hiddenInput(['readonly' => true])->label(false); ?>
                        <?=
                        $form->field($model, 'user_id')->widget(Select2::className(), [
                            'data' => ArrayHelper::map(app\modules\depress\models\Profile::find()->all(), 'user_id', 'name'),
                            'options' => [
                                'placeholder' => '<--เลือกรายการ-->'
                            ],
                            'pluginOptions' => [ 'disabled' => true],
                            'readonly' => true
                        ])
                        ?>
                    </div>
            
        </div>
       

        <div class="form-group">
            <?= Html::submitButton('บันทึก', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
