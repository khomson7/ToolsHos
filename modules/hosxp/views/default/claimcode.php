<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;

$this->title = 'ข้อมูล Claimcode';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php

$form = ActiveForm::begin(['method' => 'get',
    'action' => Url::to(['default/claimcode'])]);
?>


    <div class="row">
        <div class="col-md-12">
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