<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;

//use kartik\grid\GridView;

$this->title = 'ข้อมูล Claimcode';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php

$form = ActiveForm::begin(['method' => 'get',
    'action' => Url::to(['visit-pttype/claimcode'])]);
?>

<div class="d-flex flex-column">
     <div class="d-flex justify-content-center">  
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><i class="fa fa-search"></i> ค้นหา</div>
                <div class="panel-body">



                    <label for="pwd">พิมพ์เลขบัตรประชาชน 13 หลัก : &nbsp;&nbsp; </label>
                    <input type="hex"  name="user"  placeholder="">


                    &nbsp;&nbsp;<button class='btn btn-danger'>ค้นหา</button>



                </div>
            </div>
        </div>
    </div>
</div>
</div>

    <?php ActiveForm::end();?>

    <?php
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
    'columns' => [
        
        
        
        [
            'attribute' => 'vstdate',
            'label' => "วันที่รับบริการ",
        ],
      
        [
            'attribute' => 'vn',
            'label' => "VN",
            'contentOptions' => [
                'style' => 'background-color:;color:white',
            ],
            'format' => 'raw',
            'value' => function ($data) {
                return Html::a(Html::encode($data['vn']), 'index.php?r=hosxp/visit-pttype/update&vn=' . $data['vn'].'&pttype=' . $data['pttype'], ['data-pjax' => 0]);
            },
        ],
                    
        [
            'attribute' => 'cid',
            'label' => "CID",
        ],
                    

    ],
]);
?>

<?php
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
    
  
    
    'columns' => [
        
       
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
            'label' => "ชื่อสิทธ",
        ],

    ],
]);
?>

<div class="alert bg_col_pink" role="alert">
    <div>รายการ ClaimCode</div>
<?php
echo GridView::widget([
    'dataProvider' => $dataProvider2,
    'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
    
  
    
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
            'attribute' => 'cid',
            'label' => "CID",
        ],
        [
            'attribute' => 'ptname',
            'label' => "ชื่อ - สกุล",
        ],
        
        [
            'attribute' => 'pttname',
            'label' => "ชื่อสิทธ",
        ],

    ],
]);
?>
</div>