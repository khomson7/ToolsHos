
<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'APIError';
$message = 'ท่านยังไม่เปิดใช้งาน Token / Api มีปัญหา';

?>
<div class="d-flex justify-content-center">
      <h1><?=Html::img(Url::base().'/images/sql_error.png')?>
      <p class="text-danger"><?= Html::encode($this->title) ?></p></h1>
 
</div>
<div class="d-flex justify-content-center">
<p class="text-danger"><?= nl2br(Html::encode($message)) ?></p>