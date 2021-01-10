<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
$this->title = 'ปรับข้อมูลคัดกรองบุหรี่-สุรา';
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

<?php
$form = ActiveForm::begin(['method' => 'get',
    'action' => Url::to(['default/allsm'])]);
?>
<div class='well'>
        วันที่
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4">
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

        </div>
        <div class="col-xs-2 col-sm-2 col-md-2">
            <button class='showModalButton btn btn-danger'>ประมวลผล</button>
        </div>
    </div>
    <br>
<?php ActiveForm::end();?>
</div>