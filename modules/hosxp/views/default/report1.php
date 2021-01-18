
<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'รายงานบันทึก ClaimCode';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
yii\bootstrap4\Modal::begin([
    'headerOptions' => ['id' => 'modalHeader'],
    'id' => 'modal',
    'size' => 'modal-lg',
/*
    'closeButton' => [
        'id' => 'close-button',
        'class' => 'close',
        'data-dismiss' => 'modal',
    ],
*/
    //keeps from closing modal with esc key or by clicking out of the modal.
    // user must click cancel or X to close
    'clientOptions' => [
        'backdrop' => false,
        'keyboard' => false,
    ],
]);
echo "<div id='modalContent'> <h3> กำลังประมวลผลข้อมูลกรุณารอสักครู่ </h3> <div style='text-align:center'>" . Html::img('@web/images/ajax-loader.gif') . "</div></div>";
yii\bootstrap4\Modal::end();
?>


<div class="panel panel-primary">
    <div class="panel-heading"><i class="glyphicon glyphicon-paperclip"></i> รายงานบันทึก ClaimCode ตามช่วงวันที่</div>
    <div class="panel-body">
<?php
$form = ActiveForm::begin(['method' => 'get',
    'action' => Url::to(['default/report1'])]);
?>

 <div class="d-flex flex-column">
     <div class="d-flex justify-content-center"> 
<div class="alert bg_col_pink" role="alert">
           <div class="d-flex justify-content-center">เลือกช่วงวันที่ </div>
        
    
            <?php
echo yii\jui\DatePicker::widget([
    'name' => 'date1',
    'value' => $date1,
    'language' => 'th',
    'dateFormat' => 'yyyy-MM-dd',
    'clientOptions' => [
        'changeMonth' => true,
        'changeYear' => true,
    ],
    'options' => [
        'class' => 'form-control',
    ],
]);
?>
ถึงวันที่:
            <?php
            echo yii\jui\DatePicker::widget([
                'name' => 'date2',
                'value' => $date2,
                'language' => 'th',
                'dateFormat' => 'yyyy-MM-dd',
                'clientOptions' => [
                    'changeMonth' => true,
                    'changeYear' => true,
                ],
                'options' => [
                    'class' => 'form-control'
                ],
            ]);
            ?>

        </div>
    </div>
    <div class="d-flex flex-column">
     <div class="d-flex justify-content-center">  
        <div class="col-xs-2 col-sm-2 col-md-2">
            <button class='showModalButton btn btn-info'>ประมวลผล</button>
        </div>
    </div>
</div>
   
  
<?php ActiveForm::end();?>
<br>
        

        <?php
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
            'exportConfig' => [
                GridView::EXCEL => []
            ],
            'panel' => [
                'type' => GridView::TYPE_DANGER,
                // 'heading' => $heading,
                'before' => '<div><font color="blue">' . '(ข้อมูล ClaimCode)'  . '</font></div>',
            ],
            'responsive'=>true,
            'hover' => true,
    'columns' => [
        [
            'class' => 'yii\grid\SerialColumn',
        ]
        ,
        
      
        [
               'attribute' => 'claim_code',
            'label' => "ClaimCode",
        ],
        [
               'attribute' => 'hosmain',
            'label' => "สถานพยาบาลหลัก",
        ],
        [
               'attribute' => 'province',
            'label' => "จังหวัด",
        ],
        [
               'attribute' => 'vstdate2',
            'label' => "วันที่รับบริการ",
        ],
        [
               'attribute' => 'cid',
            'label' => "CID",
        ],
        [
               'attribute' => 'hn',
            'label' => "HN",
        ],
       
        [
               'attribute' => 'ptname',
            'label' => "ชื่อ - สกุล",
        ],
         [
               'attribute' => 'pttname',
            'label' => "ชื่อสิทธิ",
        ],
        
        [
               'attribute' => 'staff',
            'label' => "ผู้บันทึก",
        ],
         
            ]
        ]);
        ?>
