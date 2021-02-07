<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap4\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\hosxp\models\ConfigSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Configs';
$this->params['breadcrumbs'][] = $this->title;
?>
 <?php
yii\bootstrap4\Modal::begin([
    
    'options' => [
        'tabindex' => false,
    ],
    'size' => 'modal-lg',
    'id' => 'modal',
        //'class'=>'modal remote fade',
]);
echo "<div id='modalContent'></div>";
yii\bootstrap4\Modal::end();
?>
<div class="config-index">

<div class="container p-3 my-3 bg-default text-white">
<div class="panel panel-primary">
<div class="panel-heading"><i class="glyphicon glyphicon-cog"></i> <?= $this->title ?></div>
    <div class="panel-body">
    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,

       'panel' => [
        'heading' => '<h2 class="panel-title"><i class="glyphicon glyphicon-cog"></i> ตั้งค่าระบบ </h2><br>'
    ,
        'type' => 'warning',
        
                'before' => '<button type="button" class="btn btn-danger"><i class="glyphicon glyphicon-calendar">&nbsp;ตั้งค่าปีงบ</i></button>' ,
    ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'class' => 'yii\grid\ActionColumn',
                'options' => ['style' => 'width:90px;'],
                'template' => '<div class="btn-group btn-group-sm" role="group" aria-label="...">{update}</div>',
                'buttons' => [
                    'update' => function($url, $model, $key) {
                        return Html::a('<i class="glyphicon glyphicon-pencil"></i>', $url, ['class' => 'btn btn-warning']);
                    }, // 
                    'update' => function($url, $model, $key) {
                        return Html::a('<i class="glyphicon glyphicon-wrench"></i>', $url, ['class' => 'btn btn-info']);
                    }, // 
                ]
            ],

          //  'id',
            'hospcode',
           // 'befor_byear',
           // 'byear',
            'chwpart',
            'amppart',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
<?php
$user_id = Yii::$app->user->getId();
$script = <<< JS

   $('#btnadd').click(function() {
        var date = '';
        $.get('index.php?r=hrisk/risk-to-nrls/create',{'date':date,'type':1},function(data){
            $('#modal').modal('show')
            .find('#modalContent')
            .html(data);
        
         });
        
   });    
   $('#btnadd2').click(function() {
        var date = '';
        $.get('index.php?r=hrisk/nrls-date-send/update&id=$user_id',{'date':date,'type':1},function(data){
            $('#modal').modal('show')
            .find('#modalContent')
            .html(data);
        
         });
        
   });  

   $('#btnadd3').click(function() {
        var date = '';
        $.get('index.php?r=hrisk/risk-to-nrls/nrls-export',{'date':date,'type':1},function(data){
            $('#modal').modal('show')
            .find('#modalContent')
            .html(data);
        
         });
        
   });  

   $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
})

JS;
$this->registerJs($script);
?>