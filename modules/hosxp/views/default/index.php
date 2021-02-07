
<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
$this->title = 'รายงานทั้งหมด';
$this->params['breadcrumbs'][] = 'รายงาน';
?>
<?php
$count = Yii::$app->db->createCommand("SELECT count(id) as cc,sum(count_report) as r_count FROM hos_basedata where active = 'True' ")->queryAll();
foreach ($count as $d) {
    ?>          

    <?php
}
?>

<div class="container">
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2><strong><font color="#1F618D">จำนวน <?php echo $d['cc'] ?> รายงาน
            </font></strong></h2>

        </div>
        <div class="panel-body">
            <?php
             $i = 1;
            $depList = Yii::$app->db->createCommand("SELECT * FROM hos_basedata where active = 'True' order by id asc")->queryAll();
            foreach ($depList as $ds) {
                ?>


                <p>
                <li> <a href="index.php?r=<?= $ds['link'] ?>" ><?= $i ?> <?= $ds['base_data'] ?>
                    </a></li>
                </p>

                <?php
                 $i++;
            }
            ?>
        </div>
    </div>
</div>   
</div>

</div>
