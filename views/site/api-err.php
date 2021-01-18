<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;

$message2 = 'มีปัญหากาารเชื่อมต่อ API';
$this->title = $message2;
?>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
      <div class="col-xs-12 col-sm-12 col-md-12">
     
      </div>
    
      <div class="modal-body">
        
        <button type="button" class="btn btn-link">
      <!--  <img src="./img/report3.png" class="img-responsive" style="margin:0 auto;"/> -->
         <?=Html::a('<img src="./images/sql_error.png" class="img-responsive" style="margin:0 auto;"/> ', ['/site/login'], ['class' => 'btn btn-default'])?>

         <div class="modal-body" style="color:orange;">
         	<h4>
         <?= $message2 ?><br> กรุณา <br>ออกจากระบบ <br>แล้วเข้าสู่ระบบใหม่
     </h4>
       
        
</div>
          </button>
      </div>
<!--
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
      </div>-->
    </div> 

  </div>

<div class="site-error">


    <div class="alert alert-danger">
        <?= $message2 ?>
    </div>

    

</div>

<script type="text/javascript">

    $(window).load(function() {

        var url = '<?= \yii\helpers\Url::to(['site/index']); ?>';

        $('#myModal').modal('show');

       // $('#modalContent').load(url);

    });

</script>