<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\drugreturn\models\RedrugDepartment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="redrug-department-form">

    <?php $form = ActiveForm::begin(); ?>
    

    
   

    <div class="panel panel-danger">
        <div class="panel panel-danger">
            <div class="panel-heading"><h4>บันทึกรายการยา</h4></div>
        </div>
        <div class="row">
            
            <div class="col-sm-offset-1 col-sm-3">            

                    <?=
                    $form->field($model, 'b_date')->widget(
                            DatePicker::className(), [
                        'name' => 'b_date',
                        'language' => 'th',
                        // 'dateFormat' => 'yyyy-MM-dd',
                        //'value' => date('yyyy-mm-dd', strtotime('+2 days')),
                        'options' => ['placeholder' => 'วันที่'],
                        'pluginOptions' => [
                            'format' => 'yyyy-mm-dd',
                            'todayHighlight' => true
                        ]
                    ]);
                    ?>
                </div>
            
             <div class="col-sm-offset-1 col-sm-7">            
                        <?=
                        $form->field($model, 'user_id')->widget(Select2::className(), [
                            'data' => ArrayHelper::map(app\modules\depress\models\Profile::find()->all(), 'user_id', 'name'),
                            'options' => [
                                'placeholder' => '<--เลือกรายการยา-->'
                            ],
                            'pluginOptions' => ['allowClear' => true]
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
