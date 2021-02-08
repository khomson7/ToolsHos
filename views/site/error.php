<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $name;
?>
<div class="site-error">

    

    <div class="d-flex justify-content-center">
      <h1><?=Html::img(Url::base().'/images/sql_error.png')?>
    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>
    </div>

    

</div>


