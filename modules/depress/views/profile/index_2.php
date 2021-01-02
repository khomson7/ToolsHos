<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\bootstrap4\Modal;
use yii\helpers\ArrayHelper;
use app\models\MyActiveRecord;

$this->title = 'ปรับข้อมูลคัดกรองบุหรี่-สุรา';
//$this->params['breadcrumbs'][] = $this->title;

?>
<?php
Modal::begin([
    'id' => 'activity-modal',
    // 'header' => '<h4 class="modal-title">รายละเอียด</h4>',
    'size' => 'modal-lg',
        //  'footer' => '<input name="action" onclick="history.back()" type="submit" value="Cancel"/>',
]);
Modal::end();
?>

<div class="profile-index">

    <p>
        <?= Html::a('<i class=""></i> เพิ่มเติม บุหรี่-สุรา(specialpp)', ['/depress/default/allsm'], ['class' => 'btn btn-warning']) ?>
    </p>
    <p>
        <button onClick="window.location.reload()">Refresh</button>
    </p>
</div>

<?php Pjax::begin(['id' => 'tools-grid']); ?>
<?=
GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'responsive' => true,
    'hover' => true,
    'floatHeader' => true,
    'pjax' => true,
    'pjaxSettings' => [
        'neverTimeout' => true,
        'enablePushState' => false,
        'options' => ['id' => 'CustomerGrid'],
    ],
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'class' => 'yii\grid\ActionColumn',
            'options' => ['style' => 'width:90px;'],
            'template' => '<div class="btn-group btn-group-sm" role="group" aria-label="...">{update2}</div>',
            'buttons' => [
                'update2' => function($url, $model, $key) {
                    return Html::a('<i class="glyphicon glyphicon-send"></i>', $url);
                }, // 
            ]
        ],
        //  'user_id',
        'name',
        //  'public_email:email',
        //  'gravatar_email:email',
        // 'gravatar_id',
        //'location',
        //'website',
        //'bio:ntext',
        //'timezone',
        'doctor_code',
        'b_date',
        'data_count',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update}',
            'contentOptions' => [
                'noWrap' => true
            ],
            'buttons' => [
                'view' => function ($url, $model, $key) {
                    return Html::a('ข้อมูล', '#', [
                                'class' => 'activity-view-link',
                                'title' => 'ดูข้อมูล',
                                'data-toggle' => 'modal',
                                'data-target' => '#activity-modal',
                                'data-id' => $key,
                                'data-pjax' => '0',
                    ]);
                },
                'update' => function($url, $model, $key) {
                    return Html::a('<i class="glyphicon glyphicon-edit"> </i>', '#', [
                                'class' => 'activity-update-link',
                                'title' => 'ปรับข้อมูล',
                                'data-toggle' => 'modal',
                                'data-target' => '#activity-modal',
                                'data-id' => $key,
                                'data-pjax' => '0',
                    ]);
                },
            ]
        ],
    ],
]);
?>

<?php Pjax::end(); ?>

<script>$(document).ready(function () {

        $("#element_that_opens_modal").click(function () {
            $("#modal_div").show();
        });

        window.onclick = function (event) {
            if (event.target.id != "image_in_modal_div") {
                $("#modal_div").hide();
            }
        }

    });</script>

</div>
<?php $this->registerJs('
        function init_click_handlers(){
           
            
            $(".activity-update-link").click(function(e) {
                    var fID = $(this).closest("tr").data("key");
                    $.get(
                        "?r=depress/profile/update",
                        {
                            id: fID
                        },
                        function (data)
                        {
                            $("#activity-modal").find(".modal-body").html(data);
                            $(".modal-body").html(data);
                            $(".modal-title").html("แก้ไขข้อมูลสมาชิก");
                            $("#activity-modal").modal("show");
                        }
                    );
                });
            
        }
        init_click_handlers(); //first run
        $("#customer_pjax_id").on("pjax:success", function() {
          init_click_handlers(); //reactivate links in grid after pjax update
        });'); ?>
<?php
$script = <<< JS




$('#btnhome').click(function() {
    window.location='./index.php?r=depress';
});




JS;
$this->registerJs($script);
?>
